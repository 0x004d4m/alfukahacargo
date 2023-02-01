<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class InvoiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Invoices'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Invoices'))
        {
            $this->crud->denyAccess(['create','update','delete']);
        }
        $this->crud->setModel(\App\Models\Invoice::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/invoice');
        $this->crud->setEntityNameStrings('invoice', 'invoices');
    }

    protected function setupListOperation()
    {
        if(backpack_user()->hasRole('Customer')){
            $User = User::where('id',backpack_user()->id)->first();
            if($User->company_id != null){
                $this->crud->addClause('where', 'customer_id', '=', $User->company_id);

                $amount_due = Invoice::where('customer_id',$User->company_id)->sum('amount_due');
                $amount_paid = Invoice::where('customer_id',$User->company_id)->sum('amount_paid');
                Widget::add([
                    'type' => 'card',
                    'content' => [
                        'body'=>'<div class="row text-center"><div class="col-6"><p>Amount Due: '.$amount_due.'</p></div><div class="col-6"><p>Amount Paid: '.$amount_paid.'</p></div></div>'
                    ],
                    'wrapper' => [
                        'class' => 'col-sm-12 col-md-12', // customize the class on the parent element (wrapper)
                        'style' => 'border-radius: 10px;',
                    ],
                    // 'class'        => 'alert alert-danger mb-2',
                ])->to('before_content');
            }
        }
        $this->crud->column('number');
        $this->crud->addColumn([
            'label' => "Order",
            'type' => "select",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "vin_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->column('amount');
        $this->crud->column('amount_paid');
        $this->crud->column('amount_due');
        $this->crud->column('due_date');
        $this->crud->column('payment_term');
        $this->crud->addColumn([
            'label' => "Issued By",
            'type' => "select",
            'name' => 'issued_by_id',
            'entity' => 'issuedBy',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->addColumn([
            'label' => "Branch",
            'type' => "select",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
        ]);
        $this->crud->addColumn([
            'label' => "Customer",
            'type' => "select",
            'name' => 'customer_id',
            'entity' => 'customer',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->column('note');

        $this->crud->addButtonFromView('line', 'print', 'printInvoice');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(InvoiceRequest::class);

        $this->crud->addField(['name'=>'number','type'=>'text','default'=>$this->getNewNumber()]);
        $this->crud->addField([
            'label' => "Order",
            'type' => "relationship",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "vin_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->addField([
            'label' => "Issued By",
            'type' => "relationship",
            'name' => 'issued_by_id',
            'entity' => 'issuedBy',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->addField([
            'label' => "Branch",
            'type' => "relationship",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
        ]);
        $this->crud->addField([
            'label' => "Customer",
            'type' => "relationship",
            'name' => 'customer_id',
            'entity' => 'customer',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->field('payment_term');
        $this->crud->field('due_date');
        $this->crud->field('note');
        $this->crud->field('amount');
    }

    private function getNewNumber()
    {
        $rand = rand(1000000000,9999999999);
        while(Invoice::where('number',$rand)->count() != 0){
            $rand=rand(1000000000,9999999999);
        }
        return $rand;
    }

    protected function setupShowOperation()
    {
        $this->crud->column('number');
        $this->crud->addColumn([
            'label' => "Order",
            'type' => "select",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "vin_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->addColumn([
            'label' => "Issued By",
            'type' => "select",
            'name' => 'issued_by_id',
            'entity' => 'issuedBy',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->addColumn([
            'label' => "Branch",
            'type' => "select",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
        ]);
        $this->crud->addColumn([
            'label' => "Customer",
            'type' => "select",
            'name' => 'customer_id',
            'entity' => 'customer',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->column('payment_term');
        $this->crud->column('due_date');
        $this->crud->column('note');
        $this->crud->column('amount');
        $this->crud->column('amount_paid');
        $this->crud->column('amount_due');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'payments',
            'label'          => 'Payments',
            'backpack_crud'  => 'payments',
            'visible' => function($entry){
                return count($entry->payments)>0;
            },
            'buttons' => false,
            'button_create' => false,
            'columns'         => [
                [
                    'label' => 'Payment Method',
                    'name'  => 'paymentMethod.name_'.app()->getLocale(),
                ],
                [
                    'label' => 'Number',
                    'name'  => 'number',
                ],
                [
                    'label' => 'Memo',
                    'name'  => 'memo',
                ],
                [
                    'label' => 'Paid At',
                    'name'  => 'paid_at',
                ],
                [
                    'label' => 'Amount',
                    'name'  => 'amount',
                ],
            ],
        ])->to('after_content');
        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'fees',
            'label'          => 'Fees',
            'backpack_crud'  => 'fees',
            'visible' => function($entry){
                return count($entry->fees)>0;
            },
            'buttons' => false,
            'button_create' => false,
            'columns'         => [
                [
                    'label' => 'Number',
                    'name'  => 'number',
                ],
                [
                    'label' => 'Memo',
                    'name'  => 'memo',
                ],
                [
                    'label' => 'Amount',
                    'name'  => 'amount',
                ],
            ],
        ])->to('after_content');

        if(backpack_user()->hasRole('Customer')){
            $User = User::where('id',backpack_user()->id)->first();
            if($User->company_id != null){
                $this->crud->addClause('where', 'issued_by_id', '=', $User->company_id);
            }
            if($User->company_id != null){
                $this->crud->addClause('orWhere', 'customer_id', '=', $User->company_id);
            }
        }
    }

    public function print($id)
    {
        $Invoice = Invoice::where('id',$id)->first();
        $pdf = Pdf::loadView('invoice_pdf', [
            "Invoice"=>$Invoice,
            "Carbon"=>Carbon::now(),
        ]);
        return $pdf->download('pdf_file.pdf');
    }
}

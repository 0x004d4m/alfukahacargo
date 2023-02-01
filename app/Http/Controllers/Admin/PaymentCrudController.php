<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PaymentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Payments'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Payments'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Payment::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/payment');
        $this->crud->setEntityNameStrings('payment', 'payments');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'label' => "Payment Method",
            'type' => "select",
            'name' => 'payment_method_id',
            'entity' => 'paymentMethod',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\PaymentMethod'
        ]);
        $this->crud->addColumn([
            'label' => "Invoice",
            'type' => "select",
            'name' => 'invoice_id',
            'entity' => 'invoice',
            'attribute' => "view_amount2",
            'model' => 'App\Models\Invoice'
        ]);
        $this->crud->column('number');
        $this->crud->column('memo');
        $this->crud->column('paid_at');
        $this->crud->column('amount');

        if(backpack_user()->hasRole('Customer')){
            $User = User::where('id',backpack_user()->id)->first();
            if($User->company_id != null){
                $this->crud->addClause('whereHas', 'invoice', function($q)use($User){$q->where('customer_id',$User->company_id);} );
            }
        }
    }

    private function getNewNumber()
    {
        $rand = rand(1000000000,9999999999);
        while(Payment::where('number',$rand)->count() != 0){
            $rand=rand(1000000000,9999999999);
        }
        return $rand;
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PaymentRequest::class);

        $this->crud->addField(['name'=>'number','type'=>'text','default'=>$this->getNewNumber()]);

        $this->crud->addField([
            'label' => "Payment Method",
            'type' => "relationship",
            'name' => 'payment_method_id',
            'entity' => 'paymentMethod',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\PaymentMethod'
        ]);
        $this->crud->addField([
            'label' => "Invoice",
            'type' => "relationship",
            'name' => 'invoice_id',
            'entity' => 'invoice',
            'attribute' => "view_amount",
            'model' => 'App\Models\Invoice'
        ]);
        $this->crud->field('memo');
        $this->crud->field('paid_at');
        $this->crud->field('amount');
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}

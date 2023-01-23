<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InvoiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class InvoiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Invoices'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Invoices'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Invoice::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/invoice');
        $this->crud->setEntityNameStrings('invoice', 'invoices');
    }

    protected function setupListOperation()
    {
        $this->crud->column('number');
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
        $this->crud->column('created_at');
        $this->crud->column('updated_at');

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(InvoiceRequest::class);

        $this->crud->field('number');
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
        $this->crud->field('amount_paid');
        $this->crud->field('amount_due');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PaymentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PaymentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Payments'))
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
        $this->crud->column('payer_id');
        $this->crud->column('receiver_id');
        $this->crud->column('payment_method_id');
        $this->crud->column('number');
        $this->crud->column('memo');
        $this->crud->column('paid_at');
        $this->crud->column('amount');


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PaymentRequest::class);

        $this->crud->field('payer_id');
        $this->crud->field('receiver_id');
        $this->crud->field('payment_method_id');
        $this->crud->field('number');
        $this->crud->field('memo');
        $this->crud->field('paid_at');
        $this->crud->field('amount');
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

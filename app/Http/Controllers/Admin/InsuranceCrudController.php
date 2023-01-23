<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InsuranceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class InsuranceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Insurances'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Insurances'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Insurance::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/insurance');
        $this->crud->setEntityNameStrings('insurance', 'insurances');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'label' => "Order",
            'type' => "select",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "booking_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->column('vehicle_value_ar');
        $this->crud->column('vehicle_value_en');
        $this->crud->column('total_loss');
        $this->crud->column('full_cover');


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(InsuranceRequest::class);

        $this->crud->addField([
            'label' => "Order",
            'type' => "relationship",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "booking_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->field('vehicle_value_ar');
        $this->crud->field('vehicle_value_en');
        $this->crud->field('total_loss');
        $this->crud->field('full_cover');
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

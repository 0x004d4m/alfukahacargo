<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VehicleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class VehicleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Vehicles'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Vehicles'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Vehicle::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/vehicle');
        $this->crud->setEntityNameStrings('vehicle', 'vehicles');
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
        $this->crud->column('vin_number');
        $this->crud->column('year');
        $this->crud->column('make');
        $this->crud->column('model');
        $this->crud->column('type');
        $this->crud->column('order_parts');
        $this->crud->column('order_parts_note');
        $this->crud->column('Vehicle_for_cutting');
        $this->crud->column('Vehicle for cutting note');
        $this->crud->column('department_id');
        $this->crud->column('note_to_department');
        $this->crud->column('location');


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(VehicleRequest::class);

        $this->crud->addField([
            'label' => "Order",
            'type' => "relationship",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "booking_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->field('vin_number');
        $this->crud->field('year');
        $this->crud->field('make');
        $this->crud->field('model');
        $this->crud->field('type');
        $this->crud->field('order_parts');
        $this->crud->field('order_parts_note');
        $this->crud->field('Vehicle_for_cutting');
        $this->crud->field('Vehicle for cutting note');
        $this->crud->field('department_id');
        $this->crud->field('note_to_department');
        $this->crud->field('location');
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

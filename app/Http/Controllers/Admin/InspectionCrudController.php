<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InspectionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class InspectionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Inspections'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Inspections'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Inspection::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/inspection');
        $this->crud->setEntityNameStrings('inspection', 'inspections');
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
        $this->crud->column('color');
        $this->crud->column('damage');
        $this->crud->column('new');
        $this->crud->column('keys');
        $this->crud->column('running');
        $this->crud->column('wheels');
        $this->crud->column('airbag');
        $this->crud->column('radio');


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(InspectionRequest::class);

        $this->crud->addField([
            'label' => "Order",
            'type' => "relationship",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "booking_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->field('color');
        $this->crud->field('damage');
        $this->crud->field('new');
        $this->crud->field('keys');
        $this->crud->field('running');
        $this->crud->field('wheels');
        $this->crud->field('airbag');
        $this->crud->field('radio');
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

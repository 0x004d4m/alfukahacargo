<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddonServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class AddonServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Addon services'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Addon services'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\AddonService');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/addon-service');
        $this->crud->setEntityNameStrings('addon service', 'addon services');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name_ar');
        $this->crud->addColumn([
            'label' => "Order",
            'type' => "select",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "booking_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->column('name_en');
        $this->crud->column('price');
        $this->crud->column('completed');
        $this->crud->column('note');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AddonServiceRequest::class);

        $this->crud->addField([
            'label' => "Order",
            'type' => "relationship",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "booking_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->field('name_ar');
        $this->crud->field('name_en');
        $this->crud->field('price');
        $this->crud->field('completed');
        $this->crud->field('note');
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Services'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Services'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Service::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/service');
        $this->crud->setEntityNameStrings('service', 'services');
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
        $this->crud->column('date');
        $this->crud->addColumn([
            'label' => "customer_id",
            'type' => "select",
            'name' => 'customer_id',
            'entity' => 'customer',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->addColumn([
            'label' => "Billed By",
            'type' => "select",
            'name' => 'billed_by_id',
            'entity' => 'billedBy',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->column('service_ar');
        $this->crud->column('service_en');
        $this->crud->column('quantity');
        $this->crud->column('amount');
        $this->crud->addColumn(['name' => 'invoice','type' => 'link']);


    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ServiceRequest::class);

        $this->crud->addField([
            'label' => "Order",
            'type' => "relationship",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "booking_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->field('date');
        $this->crud->addField([
            'label' => "customer_id",
            'type' => "select",
            'name' => 'customer_id',
            'entity' => 'customer',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->addField([
            'label' => "Billed By",
            'type' => "select",
            'name' => 'billed_by_id',
            'entity' => 'billedBy',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->field('service_ar');
        $this->crud->field('service_en');
        $this->crud->field('quantity');
        $this->crud->field('amount');
        $this->crud->addField([
            'name'      => 'invoice',
            'type'      => 'upload',
            'upload'    => true,
        ],);
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

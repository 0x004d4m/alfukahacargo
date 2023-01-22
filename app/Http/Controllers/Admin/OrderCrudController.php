<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Orders'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Orders'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Order::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('order', 'orders');
    }

    protected function setupListOperation()
    {
        $this->crud->column('booking_number');

        $this->crud->addColumn([
            'label' => "Order Type",
            'type' => "select",
            'name' => 'order_type_id',
            'entity' => 'orderType',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderType'
        ]);

        $this->crud->addColumn([
            'label' => "Order Status",
            'type' => "select",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderStatus'
        ]);
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(OrderRequest::class);

        $this->crud->field('booking_number');

        $this->crud->addField([
            'label' => "Order Type",
            'type' => "relationship",
            'name' => 'order_type_id',
            'entity' => 'orderType',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderType'
        ]);

        $this->crud->addField([
            'label' => "Order Status",
            'type' => "relationship",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderStatus'
        ]);
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
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PartRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PartCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Parts'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Parts'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Part::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/part');
        $this->crud->setEntityNameStrings('part', 'parts');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'label' => "Order",
            'type' => "select",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "vin_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->column('order_parts_note');
        $this->crud->column('ship_parts_with_vehicle');
        $this->crud->addColumn([
            'label' => "Branch",
            'type' => "select",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
        ]);


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PartRequest::class);

        $this->crud->addField([
            'label' => "Order",
            'type' => "relationship",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "vin_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->field('order_parts_note');
        $this->crud->field('ship_parts_with_vehicle');
        $this->crud->addField([
            'label' => "Branch",
            'type' => "relationship",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
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

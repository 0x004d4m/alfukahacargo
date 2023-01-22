<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContainerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ContainerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Containers'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Containers'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Container::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/container');
        $this->crud->setEntityNameStrings('container', 'containers');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name_ar');
        $this->crud->column('name_en');
        $this->crud->column('reference_number');
        $this->crud->column('container_number');
        $this->crud->column('shipping_line');
        $this->crud->addColumn([
            'label' => "Loading Status",
            'type' => "select",
            'name' => 'loading_status_id',
            'entity' => 'loadingStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\LoadingStatus'
        ]);
        $this->crud->addColumn([
            'label' => "Loading Port",
            'type' => "select",
            'name' => 'loading_port_id',
            'entity' => 'loadingPort',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Port'
        ]);
        $this->crud->addColumn([
            'label' => "Delivery Port",
            'type' => "select",
            'name' => 'delivery_port_id',
            'entity' => 'deliveryPort',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Port'
        ]);
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ContainerRequest::class);

        $this->crud->field('name_ar');
        $this->crud->field('name_en');
        $this->crud->field('reference_number');
        $this->crud->field('container_number');
        $this->crud->field('shipping_line');
        $this->crud->addField([
            'label' => "Loading Status",
            'type' => "relationship",
            'name' => 'loading_status_id',
            'entity' => 'loadingStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\LoadingStatus'
        ]);
        $this->crud->addField([
            'label' => "Loading Port",
            'type' => "relationship",
            'name' => 'loading_port_id',
            'entity' => 'loadingPort',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Port'
        ]);
        $this->crud->addField([
            'label' => "Delivery Port",
            'type' => "relationship",
            'name' => 'delivery_port_id',
            'entity' => 'deliveryPort',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Port'
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

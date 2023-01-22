<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoadingStatusRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class LoadingStatusCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Loading statuses'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Loading statuses'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\LoadingStatus::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/loading-status');
        $this->crud->setEntityNameStrings('loading status', 'loading statuses');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name_ar');
        $this->crud->column('name_en');
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(LoadingStatusRequest::class);

        $this->crud->field('name_ar');
        $this->crud->field('name_en');
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

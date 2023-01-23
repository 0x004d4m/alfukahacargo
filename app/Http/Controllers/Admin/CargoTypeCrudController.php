<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CargoTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CargoTypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Cargo types'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Cargo types'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\CargoType::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/cargo-type');
        $this->crud->setEntityNameStrings('cargo type', 'cargo types');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name_ar');
        $this->crud->column('name_en');


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CargoTypeRequest::class);

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

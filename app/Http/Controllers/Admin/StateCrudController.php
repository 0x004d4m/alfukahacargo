<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class StateCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage States'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage States'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\State::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/state');
        $this->crud->setEntityNameStrings('state', 'states');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name_ar');
        $this->crud->column('name_en');

        $this->crud->addColumn([
            'label' => "Country",
            'type' => "select",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Country'
        ]);


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(StateRequest::class);

        $this->crud->field('name_ar');
        $this->crud->field('name_en');

        $this->crud->addField([
            'label' => "Country",
            'type' => "relationship",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Country'
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

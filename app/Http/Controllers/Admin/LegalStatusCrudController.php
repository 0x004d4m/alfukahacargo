<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LegalStatusRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class LegalStatusCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Legal statuses'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Legal statuses'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\LegalStatus::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/legal-status');
        $this->crud->setEntityNameStrings('legal status', 'legal statuses');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name_ar');
        $this->crud->column('name_en');


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(LegalStatusRequest::class);

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

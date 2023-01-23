<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ImageTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ImageTypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Image types'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Image types'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\ImageType::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/image-type');
        $this->crud->setEntityNameStrings('image type', 'image types');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name_ar');
        $this->crud->column('name_en');


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ImageTypeRequest::class);

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

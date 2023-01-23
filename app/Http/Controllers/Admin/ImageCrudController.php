<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ImageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ImageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Images'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Images'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Image::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/image');
        $this->crud->setEntityNameStrings('image', 'images');
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
        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
        ]);
        $this->crud->addColumn([
            'label' => "Image Type",
            'type' => "select",
            'name' => 'image_type_id',
            'entity' => 'ImageType',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\ImageType'
        ]);


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ImageRequest::class);

        $this->crud->addField([
            'label' => "Order",
            'type' => "relationship",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "booking_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->addField([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
        ]);
        $this->crud->addField([
            'label' => "Image Type",
            'type' => "relationship",
            'name' => 'image_type_id',
            'entity' => 'ImageType',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\ImageType'
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

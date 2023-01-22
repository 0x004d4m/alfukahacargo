<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AuctionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class AuctionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Auctions'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Auctions'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Auction::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/auction');
        $this->crud->setEntityNameStrings('auction', 'auctions');
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
        $this->crud->setValidation(AuctionRequest::class);

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

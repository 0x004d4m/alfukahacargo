<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AuctionLocationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class AuctionLocationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Auction locations'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Auction locations'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\AuctionLocation::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/auction-location');
        $this->crud->setEntityNameStrings('auction location', 'auction locations');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name_ar');
        $this->crud->column('name_en');

        $this->crud->addColumn([
            'label' => "Auction",
            'type' => "select",
            'name' => 'auction_id',
            'entity' => 'auction',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Auction'
        ]);

        $this->crud->addColumn([
            'label' => "Country",
            'type' => "select",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Country'
        ]);

        $this->crud->addColumn([
            'label' => "State",
            'type' => "select",
            'name' => 'state_id',
            'entity' => 'state',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\State'
        ]);

        $this->crud->addColumn([
            'label' => "City",
            'type' => "select",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\City'
        ]);



    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AuctionLocationRequest::class);

        $this->crud->field('name_ar');
        $this->crud->field('name_en');

        $this->crud->addField([
            'label' => "Auction",
            'type' => "relationship",
            'name' => 'auction_id',
            'entity' => 'auction',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Auction'
        ]);

        $this->crud->addField([
            'label' => "Country",
            'type' => "relationship",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Country'
        ]);

        $this->crud->addField([
            'label' => "State",
            'type' => "relationship",
            'name' => 'state_id',
            'entity' => 'state',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\State'
        ]);

        $this->crud->addField([
            'label' => "City",
            'type' => "relationship",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\City'
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

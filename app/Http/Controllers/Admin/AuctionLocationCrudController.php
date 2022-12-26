<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AuctionLocationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AuctionLocationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AuctionLocationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\AuctionLocation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/auction-location');
        CRUD::setEntityNameStrings('auction location', 'auction locations');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name_ar');
        CRUD::column('name_en');

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

        CRUD::column('created_at');
        CRUD::column('updated_at');
        CRUD::column('deleted_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AuctionLocationRequest::class);

        CRUD::field('name_ar');
        CRUD::field('name_en');

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

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

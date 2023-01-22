<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GeneralRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class GeneralCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage General Information'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage General Information'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\General::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/general');
        $this->crud->setEntityNameStrings('general', 'generals');
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
        $this->crud->column('order_date');
        $this->crud->column('received_date');
        $this->crud->column('shipping_line');
        $this->crud->addColumn([
            'label' => "Branch",
            'type' => "select",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
        ]);
        $this->crud->addColumn([
            'label' => "Container",
            'type' => "select",
            'name' => 'container_id',
            'entity' => 'container',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Container'
        ]);
        $this->crud->addColumn([
            'label' => "Final Port",
            'type' => "select",
            'name' => 'final_port_id',
            'entity' => 'finalPort',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Port'
        ]);
        $this->crud->addColumn([
            'label' => "Final Country",
            'type' => "select",
            'name' => 'final_country_id',
            'entity' => 'finalCountry',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Country'
        ]);
        $this->crud->addColumn([
            'label' => "Final State",
            'type' => "select",
            'name' => 'final_state_id',
            'entity' => 'finalState',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\State'
        ]);
        $this->crud->addColumn([
            'label' => "Final City",
            'type' => "select",
            'name' => 'final_city_id',
            'entity' => 'finalCity',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\City'
        ]);
        $this->crud->addColumn([
            'label' => "Company",
            'type' => "select",
            'name' => 'company_id',
            'entity' => 'company',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->addColumn([
            'label' => "Consigned To",
            'type' => "select",
            'name' => 'consigned_to_id',
            'entity' => 'consignedTo',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->addColumn([
            'label' => "Seller",
            'type' => "select",
            'name' => 'seller_id',
            'entity' => 'seller',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->column('sale_origin');
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
        $this->crud->column('created_at');
        $this->crud->column('updated_at');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GeneralRequest::class);

        $this->crud->addField([
            'label' => "Order",
            'type' => "relationship",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "booking_number",
            'model' => 'App\Models\Order'
        ]);
        $this->crud->field('order_date');
        $this->crud->field('received_date');
        $this->crud->field('shipping_line');
        $this->crud->addField([
            'label' => "Branch",
            'type' => "relationship",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
        ]);
        $this->crud->addField([
            'label' => "Container",
            'type' => "relationship",
            'name' => 'container_id',
            'entity' => 'container',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Container'
        ]);
        $this->crud->addField([
            'label' => "Final Port",
            'type' => "relationship",
            'name' => 'final_port_id',
            'entity' => 'finalPort',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Port'
        ]);
        $this->crud->addField([
            'label' => "Final Country",
            'type' => "relationship",
            'name' => 'final_country_id',
            'entity' => 'finalCountry',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Country'
        ]);
        $this->crud->addField([
            'label' => "Final State",
            'type' => "relationship",
            'name' => 'final_state_id',
            'entity' => 'finalState',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\State'
        ]);
        $this->crud->addField([
            'label' => "Final City",
            'type' => "relationship",
            'name' => 'final_city_id',
            'entity' => 'finalCity',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\City'
        ]);
        $this->crud->addField([
            'label' => "Company",
            'type' => "relationship",
            'name' => 'company_id',
            'entity' => 'company',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->addField([
            'label' => "Consigned To",
            'type' => "relationship",
            'name' => 'consigned_to_id',
            'entity' => 'consignedTo',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->addField([
            'label' => "Seller",
            'type' => "relationship",
            'name' => 'seller_id',
            'entity' => 'seller',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);
        $this->crud->field('sale_origin');
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

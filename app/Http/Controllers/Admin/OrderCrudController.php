<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Support\Facades\Log;

class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Orders'))
        {
            abort(403, 'Access denied');
        }

        if(backpack_user()->hasRole('Customer')){
            $this->crud->denyAccess(['create','delete']);
        }else{
            if (!backpack_user()->can('Manage Orders'))
            {
                $this->crud->denyAccess(['create','delete','update']);
            }
        }

        $this->crud->setModel(\App\Models\Order::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('order', 'orders');
    }

    protected function setupListOperation()
    {
        $this->crud->column('vin_number');
        $this->crud->column('year');
        $this->crud->column('make');
        $this->crud->column('model');
        $this->crud->column('type');

        $this->crud->addColumn([
            'label' => "Company",
            'type' => "select",
            'name' => 'company_id',
            'entity' => 'company',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);

        $this->crud->addColumn([
            'label' => "Order Type",
            'type' => "select",
            'name' => 'order_type_id',
            'entity' => 'orderType',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderType'
        ]);

        $this->crud->addColumn([
            'label' => "Order Status",
            'type' => "select",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderStatus'
        ]);

        $this->crud->addColumn([
            'label' => "Location",
            'type' => "select",
            'name' => 'location_id',
            'entity' => 'location',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Location'
        ]);

        $this->crud->addColumn([
            'label' => "Branch",
            'type' => "select",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
        ]);

        $this->crud->addColumn([
            'label' => "Department",
            'type' => "select",
            'name' => 'department_id',
            'entity' => 'department',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Department'
        ]);

        $this->crud->addColumn([
            'label' => "Start Port",
            'type' => "select",
            'name' => 'start_port_id',
            'entity' => 'startPort',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Port'
        ]);

        $this->crud->addColumn([
            'label' => "Start Country",
            'type' => "select",
            'name' => 'start_country_id',
            'entity' => 'startCountry',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Country'
        ]);

        $this->crud->addColumn([
            'label' => "Start State",
            'type' => "select",
            'name' => 'start_state_id',
            'entity' => 'startState',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\State'
        ]);

        $this->crud->addColumn([
            'label' => "Start City",
            'type' => "select",
            'name' => 'start_city_id',
            'entity' => 'startCity',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\City'
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
            'label' => "Consigned To (From Companies)",
            'type' => "select",
            'name' => 'consigned_to_id',
            'entity' => 'consignedTo',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);

        $this->crud->addColumn([
            'label' => "Seller (From Companies)",
            'type' => "select",
            'name' => 'seller_id',
            'entity' => 'company',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);

        $this->crud->addColumn([
            'label' => "Auction",
            'type' => "select",
            'name' => 'auction_id',
            'entity' => 'auction',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Auction'
        ]);

        $this->crud->column('sale_origin');
        $this->crud->column('order_parts');
        $this->crud->column('order_parts_note');
        $this->crud->column('vehicle_for_cutting');
        $this->crud->column('vehicle_for_cutting_note');
        $this->crud->column('note_to_department');
        $this->crud->column('order_date');
        $this->crud->column('received_date');
        $this->crud->column('shipping_line');
        $this->crud->column('container_number');
        $this->crud->column('booking_number');

        $this->crud->setColumnDetails('images',[
            'label' => "Images",
            'type' => "json_images",
            'name' => 'images',
        ]);

        if(backpack_user()->hasRole('Customer')){
            $User = User::where('id',backpack_user()->id)->first();
            if($User->company_id != null){
                $this->crud->addClause('where', 'company_id', '=', $User->company_id);
            }
        }
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(OrderRequest::class);

        $this->crud->field('vin_number')->type('vin');
        $this->crud->field('year')->attributes(['readonly' => 'readonly']);
        $this->crud->field('make')->attributes(['readonly' => 'readonly']);
        $this->crud->field('model')->attributes(['readonly' => 'readonly']);
        $this->crud->field('type')->attributes(['readonly' => 'readonly']);

        $this->crud->addField([
            'label' => "Company",
            'type' => "relationship",
            'name' => 'company_id',
            'entity' => 'company',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);

        $this->crud->addField([
            'label' => "Order Type",
            'type' => "relationship",
            'name' => 'order_type_id',
            'entity' => 'orderType',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderType'
        ]);

        $this->crud->addField([
            'label' => "Order Status",
            'type' => "relationship",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderStatus'
        ]);

        $this->crud->addField([
            'label' => "Location",
            'type' => "relationship",
            'name' => 'location_id',
            'entity' => 'location',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Location'
        ]);

        $this->crud->addField([
            'label' => "Branch",
            'type' => "relationship",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
        ]);

        $this->crud->addField([
            'label' => "Department",
            'type' => "relationship",
            'name' => 'department_id',
            'entity' => 'department',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Department'
        ]);

        $this->crud->addField([
            'label' => "Start Port",
            'type' => "relationship",
            'name' => 'start_port_id',
            'entity' => 'startPort',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Port'
        ]);

        $this->crud->addField([
            'label' => "Start Country",
            'type' => "relationship",
            'name' => 'start_country_id',
            'entity' => 'startCountry',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Country'
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
            'label' => "Consigned To (From Companies)",
            'type' => "relationship",
            'name' => 'consigned_to_id',
            'entity' => 'consignedTo',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);

        $this->crud->addField([
            'label' => "Seller (From Companies)",
            'type' => "relationship",
            'name' => 'seller_id',
            'entity' => 'company',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);

        $this->crud->addField([
            'label' => "Auction",
            'type' => "relationship",
            'name' => 'auction_id',
            'entity' => 'auction',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Auction'
        ]);

        $this->crud->field('sale_origin');
        $this->crud->field('order_parts');
        $this->crud->field('order_parts_note');
        $this->crud->field('vehicle_for_cutting');
        $this->crud->field('vehicle_for_cutting_note');
        $this->crud->field('note_to_department');
        $this->crud->field('order_date');
        $this->crud->field('received_date');
        $this->crud->field('shipping_line');
        $this->crud->field('container_number');
        $this->crud->field('booking_number');

        $this->crud->field('amount');
        $this->crud->field('fees');
        $this->crud->field('payment');
        $this->crud->field('other');

        $this->crud->addField([
            'label' => "المرفقات",
            'name' => 'images',
            'type' => 'dropzone',
            'view_namespace' => 'dropzone::fields',
            'allow_multiple' => true,
            'addRemoveLinks' => true,
            'wrapper'   => [
                'class'      => 'form-group col-md-12'
            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        if(backpack_user()->hasRole('Customer')){
            $this->crud->field('note_to_department');
        }else{
            $this->setupCreateOperation();
        }
    }

    protected function setupShowOperation()
    {
        $this->crud->column('vin_number');
        $this->crud->column('year');
        $this->crud->column('make');
        $this->crud->column('model');
        $this->crud->column('type');

        $this->crud->addColumn([
            'label' => "Company",
            'type' => "select",
            'name' => 'company_id',
            'entity' => 'company',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);

        $this->crud->addColumn([
            'label' => "Order Type",
            'type' => "select",
            'name' => 'order_type_id',
            'entity' => 'orderType',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderType'
        ]);

        $this->crud->addColumn([
            'label' => "Order Status",
            'type' => "select",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderStatus'
        ]);

        $this->crud->addColumn([
            'label' => "Location",
            'type' => "select",
            'name' => 'location_id',
            'entity' => 'location',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Location'
        ]);

        $this->crud->addColumn([
            'label' => "Branch",
            'type' => "select",
            'name' => 'branch_id',
            'entity' => 'branch',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Branch'
        ]);

        $this->crud->addColumn([
            'label' => "Department",
            'type' => "select",
            'name' => 'department_id',
            'entity' => 'department',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Department'
        ]);

        $this->crud->addColumn([
            'label' => "Start Port",
            'type' => "select",
            'name' => 'start_port_id',
            'entity' => 'startPort',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Port'
        ]);

        $this->crud->addColumn([
            'label' => "Start Country",
            'type' => "select",
            'name' => 'start_country_id',
            'entity' => 'startCountry',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Country'
        ]);

        $this->crud->addColumn([
            'label' => "Start State",
            'type' => "select",
            'name' => 'start_state_id',
            'entity' => 'startState',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\State'
        ]);

        $this->crud->addColumn([
            'label' => "Start City",
            'type' => "select",
            'name' => 'start_city_id',
            'entity' => 'startCity',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\City'
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
            'label' => "Consigned To (From Companies)",
            'type' => "select",
            'name' => 'consigned_to_id',
            'entity' => 'consignedTo',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);

        $this->crud->addColumn([
            'label' => "Seller (From Companies)",
            'type' => "select",
            'name' => 'seller_id',
            'entity' => 'company',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Company'
        ]);

        $this->crud->addColumn([
            'label' => "Auction",
            'type' => "select",
            'name' => 'auction_id',
            'entity' => 'auction',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Auction'
        ]);

        $this->crud->column('sale_origin');
        $this->crud->column('order_parts');
        $this->crud->column('order_parts_note');
        $this->crud->column('vehicle_for_cutting');
        $this->crud->column('vehicle_for_cutting_note');
        $this->crud->column('note_to_department');
        $this->crud->column('order_date');
        $this->crud->column('received_date');
        $this->crud->column('shipping_line');
        $this->crud->column('container_number');
        $this->crud->column('booking_number');

        $this->crud->column('amount');
        $this->crud->column('fees');
        $this->crud->column('payment');
        $this->crud->column('other');

        $this->crud->addColumn([
            'label' => "Images",
            'type' => "json_images",
            'name' => 'images',
        ]);

        if(backpack_user()->hasRole('Customer')){
            $User = User::where('id',backpack_user()->id)->first();
            if($User->company_id != null){
                $this->crud->addClause('where', 'company_id', '=', $User->company_id);
            }
        }

        Widget::add([
            'type'           => 'relation_panel',
            'name'           => 'inspection',
            'label'          => 'Inspection',
            'backpack_crud'  => 'inspection',
            'visible' => function($entry){
                return is_null($entry->inspection);
            },
            'buttons' => false,
            'columns'         => [
                [
                    'label' => 'Color',
                    'name'  => 'color',
                ],
                [
                    'label' => 'Damage',
                    'name'  => 'damage',
                ],
                [
                    'label' => 'New',
                    'name'  => 'new',
                ],
                [
                    'label' => 'Keys',
                    'name'  => 'keys',
                ],
                [
                    'label' => 'Running',
                    'name'  => 'running',
                ],
                [
                    'label' => 'Wheels',
                    'name'  => 'wheels',
                ],
                [
                    'label' => 'Airbag',
                    'name'  => 'airbag',
                ],
                [
                    'label' => 'Radio',
                    'name'  => 'radio',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'services',
            'label'          => 'Services',
            'backpack_crud'  => 'service',
            'visible' => function($entry){
                return count($entry->services)>0;
            },
            'buttons' => false,
            'button_create' => false,
            'columns'         => [
                [
                    'label' => 'Date',
                    'name'  => 'date',
                ],
                [
                    'label' => 'Customer',
                    'name'  => 'customer.name_'.app()->getLocale(),
                ],
                [
                    'label' => 'Billed By',
                    'name'  => 'billedBy.name_'.app()->getLocale(),
                ],
                [
                    'label' => 'Name',
                    'name'  => 'name',
                ],
                [
                    'label' => 'Quantity',
                    'name'  => 'quantity',
                ],
                [
                    'label' => 'Amount',
                    'name'  => 'amount',
                ],
                [
                    'label' => 'Invoice',
                    'name'  => 'invoice',
                    'type'  => 'link',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'documents',
            'label'          => 'Documents',
            'backpack_crud'  => 'documents',
            'visible' => function($entry){
                return count($entry->documents)>0;
            },
            'buttons' => false,
            'button_create' => false,
            'columns'         => [
                [
                    'label' => 'Title',
                    'name'  => 'title',
                ],
                [
                    'label' => 'Country',
                    'name'  => 'country.name_'.app()->getLocale(),
                ],
                [
                    'label' => 'State',
                    'name'  => 'state.name_'.app()->getLocale(),
                ],
                [
                    'label' => 'City',
                    'name'  => 'city.name_'.app()->getLocale(),
                ],
                [
                    'label' => 'Title Type',
                    'name'  => 'title_type',
                ],
                [
                    'label' => 'Title Received Date',
                    'name'  => 'title_received_date',
                ],
                [
                    'label' => 'Bill Of Sale',
                    'name'  => 'bill_of_sale',
                ],
                [
                    'label' => 'Copy Of Original Title',
                    'name'  => 'copy_of_original_title',
                    'type'  => 'link',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'notes',
            'label'          => 'Notes',
            'backpack_crud'  => 'notes',
            'visible' => function($entry){
                return count($entry->notes)>0;
            },
            'buttons' => false,
            'button_create' => false,
            'columns'         => [
                [
                    'label' => 'Date',
                    'name'  => 'date',
                ],
                [
                    'label' => 'Note',
                    'name'  => 'note',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'parts',
            'label'          => 'Parts',
            'backpack_crud'  => 'parts',
            'visible' => function($entry){
                return count($entry->parts)>0;
            },
            'buttons' => false,
            'button_create' => false,
            'columns'         => [
                [
                    'label' => 'Order Parts Note',
                    'name'  => 'order_parts_note',
                ],
                [
                    'label' => 'Ship Parts With Vehicle',
                    'name'  => 'ship_parts_with_vehicle',
                ],
                [
                    'label' => 'Branch',
                    'name'  => 'branch.name_'.app()->getLocale(),
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'addonServices',
            'label'          => 'Addon Services',
            'backpack_crud'  => 'addonServices',
            'visible' => function($entry){
                return count($entry->addonServices)>0;
            },
            'buttons' => false,
            'button_create' => false,
            'columns'         => [
                [
                    'label' => 'Name',
                    'name'  => 'name',
                ],
                [
                    'label' => 'Price',
                    'name'  => 'price',
                ],
                [
                    'label' => 'Completed',
                    'name'  => 'completed',
                ],
                [
                    'label' => 'Note',
                    'name'  => 'note',
                ],
            ],
        ])->to('after_content');

        Widget::add([
            'type'           => 'relation_table',
            'name'           => 'insurances',
            'label'          => 'Insurances',
            'backpack_crud'  => 'insurances',
            'visible' => function($entry){
                return count($entry->insurances)>0;
            },
            'buttons' => false,
            'button_create' => false,
            'columns'         => [
                [
                    'label' => 'Name',
                    'name'  => 'name',
                ],
                [
                    'label' => 'Total Loss',
                    'name'  => 'total_loss',
                ],
                [
                    'label' => 'Full Cover',
                    'name'  => 'full_cover',
                ],
            ],
        ])->to('after_content');
    }
}

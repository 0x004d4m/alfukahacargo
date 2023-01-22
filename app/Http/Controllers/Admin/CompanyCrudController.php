<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompanyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CompanyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Companies'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Companies'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Company::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/company');
        $this->crud->setEntityNameStrings('company', 'companies');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name_ar');
        $this->crud->column('name_en');

        $this->crud->addColumn([
            'label' => "Company Type",
            'type' => "select",
            'name' => 'company_type_id',
            'entity' => 'companyType',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\CompanyType'
        ]);

        $this->crud->addColumn([
            'label' => "Legal Status",
            'type' => "select",
            'name' => 'legal_status_id',
            'entity' => 'legalStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\LegalStatus'
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
        $this->crud->setValidation(CompanyRequest::class);

        $this->crud->field('name_ar');
        $this->crud->field('name_en');

        $this->crud->addField([
            'label' => "Company Type",
            'type' => "relationship",
            'name' => 'company_type_id',
            'entity' => 'companyType',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\CompanyType'
        ]);

        $this->crud->addField([
            'label' => "Legal Status",
            'type' => "relationship",
            'name' => 'legal_status_id',
            'entity' => 'legalStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\LegalStatus'
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

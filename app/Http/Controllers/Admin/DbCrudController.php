<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DbRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class DbCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Db::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/db');
        $this->crud->setEntityNameStrings('db', 'dbs');
    }

    protected function setupListOperation()
    {
        $this->crud->column('stop_access')->type('boolean');
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(DbRequest::class);

        $this->crud->field('stop_access')->type('boolean');
    }
}

<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Db extends Model
{
    use CrudTrait, HasFactory;

    protected $table = 'dbs';
    protected $guarded = ['id'];
    protected $fillable = ['stop_access'];
}

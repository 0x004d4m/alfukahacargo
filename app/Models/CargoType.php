<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargoType extends Model
{
    use CrudTrait,SoftDeletes, HasFactory;

    protected $table = 'cargo_types';
    protected $guarded = ['id'];
    protected $fillable = ['name_ar','name_en'];
}

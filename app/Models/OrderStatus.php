<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'order_statuses';
    protected $guarded = ['id'];
    protected $fillable = [
        'name_ar',
        'name_en',
    ];
}

<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    use CrudTrait;

    protected $table = 'order_types';
    protected $guarded = ['id'];
    protected $fillable = [
        'name_ar',
        'name_en',
    ];
    protected $appends = [
        'name',
    ];

    public function getNameAttribute($value)
    {
        if(app()->getLocale() == 'ar'){
            return $this->name_ar;
        }else{
            return $this->name_en;
        }
    }
}

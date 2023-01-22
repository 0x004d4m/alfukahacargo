<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'insurances';
    protected $guarded = ['id'];
    protected $fillable = [
        'vehicle_value_ar',
        'vehicle_value_en',
        'total_loss',
        'full_cover',
        'order_id',
    ];
    protected $appends = [
        'name',
    ];

    public function getNameAttribute($value)
    {
        if(app()->getLocale() == 'ar'){
            return $this->vehicle_value_ar;
        }else{
            return $this->vehicle_value_en;
        }
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

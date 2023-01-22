<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddonService extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'addon_services';
    protected $guarded = ['id'];
    protected $fillable = [
        'name_ar',
        'name_en',
        'price',
        'completed',
        'note',
        'order_id',
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

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

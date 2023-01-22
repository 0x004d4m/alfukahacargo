<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Container extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'containers';
    protected $guarded = ['id'];
    protected $fillable = [
        'name_ar',
        'name_en',
        'reference_number',
        'container_number',
        'loading_status_id',
        'loading_port_id',
        'delivery_port_id',
        'shipping_line',
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

    public function loadingStatus()
    {
        return $this->belongsTo(LoadingStatus::class);
    }
    public function loadingPort()
    {
        return $this->belongsTo(Port::class,'loading_port_id');
    }
    public function deliveryPort()
    {
        return $this->belongsTo(Port::class,'delivery_port_id');
    }
}

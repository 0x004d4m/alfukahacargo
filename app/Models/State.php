<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use CrudTrait,SoftDeletes, HasFactory;

    protected $table = 'states';
    protected $guarded = ['id'];
    protected $fillable = ['name_ar','name_en','country_id'];
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

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

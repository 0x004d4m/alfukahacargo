<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoadingStatus extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'loading_statuses';
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

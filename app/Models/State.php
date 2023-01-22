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

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

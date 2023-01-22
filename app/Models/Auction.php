<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use CrudTrait,SoftDeletes,HasFactory;

    protected $table = 'auctions';
    protected $guarded = ['id'];
    protected $fillable = ['name_ar','name_en'];
}

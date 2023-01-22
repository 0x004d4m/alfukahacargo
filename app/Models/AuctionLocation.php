<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuctionLocation extends Model
{
    use CrudTrait,SoftDeletes, HasFactory;

    protected $table = 'auction_locations';
    protected $guarded = ['id'];
    protected $fillable = ['name_ar','name_en','auction_id','country_id','state_id','city_id'];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class General extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'generals';
    protected $guarded = ['id'];
    protected $fillable = [
        'branch_id',
        'order_date',
        'received_date',
        'shipping_line',
        'container_id',
        'booking_number',
        'final_port_id',
        'final_country_id',
        'final_state_id',
        'final_city_id',
        'company_id',
        'consigned_to_id',
        'seller_id',
        'sale_origin',
        'auction_id',
        'port_id',
        'country_id',
        'state_id',
        'city_id',
        'order_id',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function container()
    {
        return $this->belongsTo(Container::class);
    }

    public function finalPort()
    {
        return $this->belongsTo(Port::class, 'final_port_id');
    }

    public function finalCountry()
    {
        return $this->belongsTo(Country::class,'final_country_id');
    }

    public function finalState()
    {
        return $this->belongsTo(State::class,'final_state_id');
    }

    public function finalCity()
    {
        return $this->belongsTo(City::class,'final_city_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function consignedTo()
    {
        return $this->belongsTo(Company::class,'consigned_to_id');
    }

    public function seller()
    {
        return $this->belongsTo(Company::class,'seller_id');
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function port()
    {
        return $this->belongsTo(Port::class);
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

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

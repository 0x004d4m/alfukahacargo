<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'orders';
    protected $guarded = ['id'];
    protected $fillable = [
        'company_id',
        'order_type_id',
        'order_status_id',
        'branch_id',
        'department_id',
        'location_id',
        'start_port_id',
        'start_country_id',
        'start_state_id',
        'start_city_id',
        'final_port_id',
        'final_country_id',
        'final_state_id',
        'final_city_id',
        'consigned_to_id',
        'seller_id',
        'auction_id',
        'vin_number',
        'year',
        'make',
        'model',
        'type',
        'sale_origin',
        'order_parts',
        'order_parts_note',
        'vehicle_for_cutting',
        'vehicle_for_cutting_note',
        'note_to_department',
        'order_date',
        'received_date',
        'shipping_line',
        'container_number',
        'booking_number',
        'images',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function startPort()
    {
        return $this->belongsTo(Port::class,'start_port_id');
    }

    public function startCountry()
    {
        return $this->belongsTo(Country::class,'start_country_id');
    }

    public function startState()
    {
        return $this->belongsTo(State::class,'start_state_id');
    }

    public function startCity()
    {
        return $this->belongsTo(City::class,'start_city_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
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

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function orderType()
    {
        return $this->belongsTo(OrderType::class);
    }

    public function inspections()
    {
        return $this->hasOne(Inspection::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }

    public function addonServices()
    {
        return $this->hasMany(AddonService::class);
    }

    public function insurances()
    {
        return $this->hasMany(Insurance::class);
    }

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }
}

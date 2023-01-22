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
        'booking_number',
        'order_type_id',
        'order_status_id',
    ];
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function orderType()
    {
        return $this->belongsTo(OrderType::class);
    }

    public function generalInformation()
    {
        return $this->hasOne(General::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }

    public function inspections()
    {
        return $this->hasMany(Inspection::class);
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

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}

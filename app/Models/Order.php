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
}

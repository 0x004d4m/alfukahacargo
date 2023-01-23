<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'vehicles';
    protected $guarded = ['id'];
    protected $fillable = [
        'vin_number',
        'year',
        'make',
        'model',
        'type',
        'order_parts',
        'order_parts_note',
        'Vehicle_for_cutting',
        'vehicle_for_cutting_note',
        'department_id',
        'note_to_department',
        'order_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

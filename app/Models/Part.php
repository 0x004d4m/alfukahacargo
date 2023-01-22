<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'parts';
    protected $guarded = ['id'];
    protected $fillable = [
        'order_parts_note',
        'ship_parts_with_vehicle',
        'branch_id',
        'order_id',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'notes';
    protected $guarded = ['id'];
    protected $fillable = [
        'date',
        'note',
        'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

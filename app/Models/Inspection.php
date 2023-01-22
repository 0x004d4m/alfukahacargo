<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inspection extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'inspections';
    protected $guarded = ['id'];
    protected $fillable = [
        'color',
        'damage',
        'new',
        'keys',
        'running',
        'wheels',
        'airbag',
        'radio',
        'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

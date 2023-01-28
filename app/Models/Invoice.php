<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;
    protected $table = 'invoices';
    protected $guarded = ['id'];
    protected $fillable = [
        'order_id',
        'number', // random unique id
        'issued_by_id',
        'branch_id',
        'customer_id',
        'payment_term',
        'due_date',
        'note',
        'amount',
        'amount_paid',
        'amount_due',
    ];
    protected $appends = [
        'view_amount',
        'view_amount2',
    ];

    public function getViewAmountAttribute()
    {
        return ($this->order->vin_number??'')." - ".$this->number." - (Amount: $this->amount_due, Paid: $this->amount_paid, Due: $this->amount_due)";
    }

    public function getViewAmount2Attribute()
    {
        return ($this->order->vin_number??'')." - ".$this->number;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function issuedBy()
    {
        return $this->belongsTo(Company::class,'issued_by_id');
    }

    public function customer()
    {
        return $this->belongsTo(Company::class,'customer_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    protected static function booted()
    {
        static::creating(function ($Invoice) {
            $Invoice->amount_paid=0;
            $Invoice->amount_due=$Invoice->amount;
        });
        static::deleting(function ($Invoice) {
            $Invoice->payments()->delete();
            $Invoice->fees()->delete();
        });
    }
}

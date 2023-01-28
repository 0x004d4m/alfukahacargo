<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'payments';
    protected $guarded = ['id'];
    protected $fillable = [
        'order_id',
        'payer_id',
        'receiver_id',
        'payment_method_id',
        'invoice_id',
        'number', // random unique id
        'memo',
        'paid_at',
        'amount',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function payer()
    {
        return $this->belongsTo(Company::class,'payer_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Company::class,'receiver_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    protected static function booted()
    {
        static::creating(function ($Payment) {
            $Invoice = Invoice::where('id',$Payment->invoice->id)->first();
            $paied=((double)$Invoice->amount_paid + (double)$Payment->amount);
            $Invoice->update([
                'amount_due'=>((double)$Invoice->amount - (double)$paied),
                'amount_paid'=>$paied,
            ]);
        });
    }
}

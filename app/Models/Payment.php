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
        'payer_id',
        'receiver_id',
        'payment_method_id',
        'invoice_id',
        'number',
        'memo',
        'paid_at',
        'amount',
    ];

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
}

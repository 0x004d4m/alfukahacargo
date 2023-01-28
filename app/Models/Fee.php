<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fee extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'fees';
    protected $guarded = ['id'];

    protected $fillable = [
        'invoice_id',
        'number',
        'memo',
        'amount',
    ];

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
        static::creating(function ($Fee) {
            $Invoice = Invoice::where('id',$Fee->invoice->id)->first();
            $Invoice->update([
                'amount_due'=>((double)$Invoice->amount_due + (double)$Fee->amount),
            ]);
        });
        static::deleting(function ($Fee) {
            $Invoice = Invoice::where('id',$Fee->invoice->id)->first();
            $Invoice->update([
                'amount_due'=>((double)$Invoice->amount_due - (double)$Fee->amount),
            ]);
        });
    }
}

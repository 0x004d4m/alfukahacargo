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
        'number',
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
}

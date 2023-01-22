<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'services';
    protected $guarded = ['id'];
    protected $fillable = [
        'date',
        'customer_id',
        'billed_by_id',
        'service_ar',
        'service_en',
        'quantity',
        'amount',
        'invoice',
        'order_id',
    ];
    protected $appends = [
        'name',
    ];

    public function getNameAttribute($value)
    {
        if(app()->getLocale() == 'ar'){
            return $this->service_ar;
        }else{
            return $this->service_en;
        }
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function customer()
    {
        return $this->belongsTo(Company::class);
    }

    public function billedBy()
    {
        return $this->belongsTo(Company::class);
    }

    public function getInvoiceAttribute($value)
    {
        return url('storage/'.$value);
    }

    public function setInvoiceAttribute($value)
    {
        $attribute_name = "invoice";
        $disk = "public";
        $destination_path = "uploads/invoice";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);
    }
}

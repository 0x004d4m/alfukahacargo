<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use CrudTrait, SoftDeletes, HasFactory;

    protected $table = 'documents';
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'country_id',
        'state_id',
        'city_id',
        'title_type',
        'title_received_date',
        'bill_of_sale',
        'copy_of_original_title',
        'order_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getCopyOfOriginalTitleAttribute($value)
    {
        return url('storage/'.$value);
    }

    public function setCopyOfOriginalTitleAttribute($value)
    {
        $attribute_name = "copy_of_original_title";
        $disk = "public";
        $destination_path = "uploads/copy_of_original_title";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);
    }
}

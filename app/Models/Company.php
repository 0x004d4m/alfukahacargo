<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use CrudTrait,SoftDeletes, HasFactory;

    protected $table = 'companies';
    protected $guarded = ['id'];
    protected $fillable = ['name_ar','name_en','company_type_id','legal_status_id','country_id','state_id','city_id'];

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }

    public function legalStatus()
    {
        return $this->belongsTo(LegalStatus::class);
    }

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
}

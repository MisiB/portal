<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myadministrationfees extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function company(){
        return $this->hasOne(company::class,'id','company_id');
    }

    public function currency(){
        return $this->hasOne(currency::class,'id','currency_id');
    }

    public function entity(){
        return $this->hasOne(entity::class,'id','entity_id');
    }
}

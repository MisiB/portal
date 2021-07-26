<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class threshold extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function procurementclass(){
        return $this->hasOne(procurementclass::class,'id','procurementclass_id');
    }

    public function classification(){
        return $this->hasOne(classification::class,'id','classification_id');
    }

    public function currency(){
        return $this->hasOne(currency::class,'id','currency_id');
    }

    public function spocfees(){
        return $this->hasMany(spocfees::class,'threshold_id','id');
    }
}

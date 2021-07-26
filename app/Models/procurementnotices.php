<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procurementnotices extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function entity(){
        return $this->hasOne(entity::class,'id','entity_id');
    }

    public function procurementtype(){
        return $this->hasOne(procurementtype::class,'id','procurementtype_id');
    }

    public function createdby(){
        return $this->hasOne(User::class,'id','created_by');
    }
    public function currency(){
        return $this->hasOne(currency::class,'id','currency_id');
    }
    public function publishedby(){
        return $this->hasOne(User::class,'id','published_by');
    }

    public function products(){
        return $this->hasMany(procurementproducts::class,'procurementnotice_id','id');
    }

    public function classification(){
        return $this->hasOne(classification::class,'id','classification_id');
    }
}

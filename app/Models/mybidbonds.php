<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mybidbonds extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function company(){
        return $this->hasOne(company::class,'id','company_id');
    }

    public function invoice(){
        return  $this->hasOne(tender_invoice::class,'tendernumber','tendernumber');
    }

    public function entity(){
        return $this->hasOne(entity::class,'id','entity_id');
    }
}

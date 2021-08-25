<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suspensetransfer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fromCompany(){
        return $this->hasOne(company::class,'id','from_company_id');
    }

    public function toCompany(){
        return $this->hasOne(company::class,'id','to_company_id');
    }

    public function requestedBy(){
        return $this->hasOne(administrator::class,'id','requestedby');
    }

    public function approvedBy(){
        return $this->hasOne(administrator::class,'id','approvedby');
    }
}

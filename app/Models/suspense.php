<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suspense extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function suspenseReceipts(){
        return $this->hasMany(suspense_receipts::class,'suspense_id','id');
    }

    public function company(){
        return $this->hasOne(company::class,'id','company_id');
    }
}

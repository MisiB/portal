<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banktransactions extends Model
{
    use HasFactory;

    protected $guarded =[];
    
    public function company(){
        return $this->hasOne(company::class,'regnumber','customer_number');
    }

    public function suspense(){
        return $this->hasOne(suspense::class,'banktransaction_id','id');
    }
}

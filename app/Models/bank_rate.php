<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_rate extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function basecurrency(){
        return $this->hasOne(currency::class,'id','base_id');
    }
    public function othercurrency(){
        return $this->hasOne(currency::class,'id','other_id');
    }
    public function user(){
        return $this->hasOne(administrator::class,'id','user_id');
    }
}

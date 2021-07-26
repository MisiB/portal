<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pricing extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function currency(){
        return $this->hasOne(currency::class,'id','currency_id');
    }

    public function user(){
        return $this->hasOne(administrator::class,'id','user_id');
    }
}

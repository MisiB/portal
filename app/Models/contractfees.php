<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contractfees extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function user(){
        return $this->hasOne(administrator::class,'id','user_id');
    }

    public function currency(){
        return $this->hasOne(currency::class,'id','currency_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidbondrefund extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bidbond()
    {
        return $this->hasOne(mybidbonds::class,'id','mybidbond_id');
    }

    public function requester(){
        return $this->hasOne(administrator::class,'id','requestedby');
    }

    public function authorisor(){
        return $this->hasOne(administrator::class,'id','authrizedBy');
    }
}

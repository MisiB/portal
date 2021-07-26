<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spocfees extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function threshold(){
        return $this->hasOne(threshold::class,'id','threshold_id');
    }
}

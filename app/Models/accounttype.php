<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accounttype extends Model
{
    use HasFactory;

     protected $guarded =[];
     
    public  function documents(){
        return $this->hasMany(documents::class,'id','accounttype_id');
    }
}

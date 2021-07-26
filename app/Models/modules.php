<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modules extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function submodules(){
        return $this->hasMany(submodules::class,'module_id','id');
    }

    public function roles(){
        return $this->belongsToMany(roles::class);
    }
}

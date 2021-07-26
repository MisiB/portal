<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submodules extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function permissions(){
        return $this->hasMany(permissions::class,'submodule_id','id');
    }

    public function roles(){
            return $this->belongsToMany(roles::class);    
    }
}

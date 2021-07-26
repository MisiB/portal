<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function modules(){
        return $this->belongsToMany(modules::class);
    }

    public function submodules(){
        return $this->belongsToMany(submodules::class);
    }

    public function permissions(){
        return $this->belongsToMany(permissions::class);
    }

    public function administrators(){
        return $this->belongsToMany(administrator::class);
    }
}

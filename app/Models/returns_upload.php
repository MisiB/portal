<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class returns_upload extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function entity(){
        return $this->hasOne(entity::class,'id','entity_id');
    }
}

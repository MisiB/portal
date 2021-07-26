<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procurementproducts extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function procurementnotice(){
        return $this->hasOne(procurementnotices::class,'id','procurementnotice_id');
    }

    public function categories(){
        return $this->hasMany(procurementproductcategory::class,'procurementproduct_id','id');
    }
}

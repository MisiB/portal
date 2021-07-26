<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class category extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $guarded=[];

    public  function  section(){
        return $this->hasOne(sections::class,'id','section_id');
    }


    public function suppliers(){
        return $this->hasMany(suppliers::class,'category_id','id');
    }
}

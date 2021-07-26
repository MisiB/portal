<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transfers extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function bank(){
        return $this->hasOne(banktransactions::class,'source_reference','referencenumber');
    }

    
}

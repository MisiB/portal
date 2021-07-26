<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suspense_receipts extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function suspenseAccount(){
        return $this->belongsTo(suspense::class,'id','suspense_id');
    }
}

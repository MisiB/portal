<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onlinepayments extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function  invoice(){
        return $this->hasOne(nonrefundable_invoices::class,'invoice_number','invoice_number');
    }

    public function  company()
    {
        return $this->belongsTo(company::class);
    }
}

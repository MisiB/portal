<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tender_invoice extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function currency()
    {
        return $this->hasOne(currency::class,'id','currency_id');
    }

    public function receipts(){
        return $this->hasMany(receipts::class,'invoicenumber','invoice_number');
    }

    public function company(){
        return $this->hasOne(company::class,'id','company_id');
    }

    public function tender(){
        return $this->hasOne(procurementnotices::class,'tendernumber','tendernumber');
    }

    public function rtgs(){
        return $this->hasMany(rtgs::class,'invoice_number','invoice_number');
    }

    public function entity(){
        return $this->hasOne(entity::class,'id','entity_id');
    }
}

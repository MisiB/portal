<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nonrefundable_invoices extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function  category(){
        return $this->hasOne(category::class,'id','category_id');
    }

    public function  currency(){
        return $this->hasOne(currency::class,'id','currency_id');
    }

    public function  receipts(){
        return $this->hasMany(receipts::class,'invoicenumber','invoice_number');
    }

    public function  company(){
        return $this->hasOne(company::class,'id','company_id');
    }
   
    public function rtgs(){
        return $this->hasMany(rtgs::class,'invoice_number','invoice_number');
    }

     public function transfers(){
        return $this->hasMany(transfers::class,'invoicenumber','invoice_number');
    }

    public function onlinepayments(){
        return $this->hasMany(onlinepayments::class,'invoice_number','invoice_number');
    }
}

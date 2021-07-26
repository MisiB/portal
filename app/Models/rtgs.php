<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rtgs extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function company(){
        return $this->hasOne(company::class,'id','company_id');
    }

    public function user()
    {
        return $this->hasOne(administrator::class,'id','user_id');
    }

    public function currency(){
        return $this->hasONe(currency::class,'id','currency_id');
    }

    public function banktransaction(){
        return $this->hasOne(banktransactions::class,'source_reference','refnumber');
    }

    public function supplierInvoices(){
        return $this->hasMany(nonrefundable_invoices::class,'invoice_number','invoice_number');
    }

    public function tender_invoices(){
        return $this->hasMany(tender_invoice::class,'invoice_number','invoice_number');
    }
}

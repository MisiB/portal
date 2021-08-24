<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipts extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function supplierinvoices(){
        return $this->hasMany(nonrefundable_invoices::class,'invoice_number','invoicenumber');
    }

    public function tenderinvoices(){
        return $this->hasMany(tender_invoice::class,'invoice_number','invoicenumber');
    }

    public function company(){
        return $this->hasOne(company::class,'id','company_id');
    }
}

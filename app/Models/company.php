<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class company extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function contacts(){
        return $this->hasOne(contacts::class,'company_id','id');
    }

    public  function  type(){
        return $this->hasOne(accounttype::class,'id','accounttype_id');
    }

    public function documents(){
         Log::info($this);
        return $this->hasMany(documents::class,'accounttype_id','accounttype_id');
    }

    public function onlinepayments(){
        return $this->hasMany(onlinepayments::class,'company_id','id');
    }

    public function statement(){
         return $this->hasMany(statement::class,'company_id','id');
    }

    public function registrations(){
        return $this->hasMany(suppliers::class,'company_id','id');
    }

    public function supplierInvoices(){
        return $this->hasMany(nonrefundable_invoices::class,'company_id','id');
    }
    
    public function receipts(){
        return $this->hasMany(receipts::class,'company_id','id');
    }
    public function rtgsuploads(){
        return $this->hasMany(rtgs::class,'company_id','id');
    }

    public function administrationfees(){
        return $this->hasMany(myadministrationfees::class,'company_id','id');
    }

    public function bidbonds(){
        return $this->hasMany(mybidbonds::class,'company_id','id');
    }

    public function invoices(){
        return $this->hasMany(tender_invoice::class,'company_id','id');
    }

    public function documentcomments(){
        return $this->hasMany(company_document_comment::class,'company_id','id');
    }

    public function bankapi(){
        return $this->hasMany(banktransactions::class,'customer_number','regnumber');
    }
}

<?php

namespace App\Repositories\administrator;

use App\Models\company;
use Illuminate\Http\Request;

class customerRepository{
public function search(Request $request){
    return  company::when($request->term,function($query,$term){
        $query->where('name','LIKE','%'.$term.'%');
        $query->orWhere('regnumber','LIKE','%'.$term.'%');
    })->orderBy('name','desc')->get();
}

public function show($id){
    $company = company::whereid($id)->first();
      
      return company::with(['users','registrations.category','type','supplierInvoices.category','supplierInvoices.currency','supplierInvoices.receipts','supplierInvoices.transfers.bank.company','supplierInvoices.onlinepayments','contacts','documents'=>function($query)use($company){
          $query->wherelocality($company->locality);
      },'documents.company'=>function($query)use($id){ 
            $query->wherecompany_id($id);     
      },'rtgsuploads','statement','onlinepayments','receipts','documentcomments','bankapi'])->whereid($id)->first();
      

     
}

public function update(Request $request,$id){
     $company = company::whereid($id)->first();
    $local ="foreign";
     if($request->country === "Zimbabwe"){

      $local="local";
     }
    $company->name = $request->name;
    $company->accounttype_id = $request->accounttype;
    $company->country = $request->country;
    $company->locality = $local;
    $company->save();
    return array("status"=>'successMessage',"message"=>'Company details successfully updated');
}
}


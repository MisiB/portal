<?php

namespace App\Repositories\administrator;

use App\Helpers\generalHelper;
use App\Models\company;
use App\Models\User;
use App\Repositories\suspenseRepository;
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
    $suspense = new suspenseRepository();
    $helper = new generalHelper();
    $zwl_nonrefundable_accountnumber = $helper->getAccountNumber($company,'ZWL','NONREFUNDABLE');
    $usd_nonrefundable_accountnumber = $helper->getAccountNumber($company,'USD','NONREFUNDABLE');
    $zwl_refundable_accountnumber = $helper->getAccountNumber($company,'ZWL','REFUNDABLE');
    $usd_refundable_accountnumber = $helper->getAccountNumber($company,'USD','REFUNDABLE');
    $usd_nonrefundable_balance =0;
    $usd_refundable_balance =0;
    $zwl_nonrefundable_balance =0;
    $zwl_refundable_balance =0;
    if(count($usd_nonrefundable_accountnumber)>0)
      {
        for ($i=0; $i < count($usd_nonrefundable_accountnumber); $i++) { 
         $usd_nonrefundable_balance = $usd_nonrefundable_balance+$suspense->getBalance($company,$usd_nonrefundable_accountnumber[$i]['accountnumber']);
        }
     
      }
      if(count($usd_refundable_accountnumber)>0)
      {
        for ($i=0; $i < count($usd_refundable_accountnumber); $i++) { 
         $usd_refundable_balance = $usd_refundable_balance+$suspense->getBalance($company,$usd_refundable_accountnumber[$i]['accountnumber']);
        }
     
      }

      if(count($zwl_nonrefundable_accountnumber)>0)
      {
        for ($i=0; $i < count($zwl_nonrefundable_accountnumber); $i++) { 
         $zwl_nonrefundable_balance = $zwl_nonrefundable_balance+$suspense->getBalance($company,$zwl_nonrefundable_accountnumber[$i]['accountnumber']);
        }
     
      }
      if(count($zwl_refundable_accountnumber)>0)
      {
        for ($i=0; $i < count($zwl_refundable_accountnumber); $i++) { 
         $zwl_refundable_balance = $zwl_refundable_balance+$suspense->getBalance($company,$zwl_refundable_accountnumber[$i]['accountnumber']);
        }
     
      }


      $company=  company::with(['users','registrations.category','type','supplierInvoices.category','supplierInvoices.currency','supplierInvoices.receipts','supplierInvoices.transfers.bank.company','supplierInvoices.onlinepayments','contacts','documents'=>function($query)use($company){
          $query->wherelocality($company->locality);
      },'documents.company'=>function($query)use($id){ 
            $query->wherecompany_id($id);     
      },'rtgsuploads','statement','onlinepayments','receipts','documentcomments','bankapi','suspense','bidbonds','administrationfees','tenderinvoices'])->whereid($id)->first();
      
 
 return compact('company','zwl_refundable_balance','zwl_nonrefundable_balance','usd_refundable_balance','usd_nonrefundable_balance');
     
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


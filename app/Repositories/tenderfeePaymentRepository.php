<?php
namespace App\Repositories;

use App\Interfaces\tenderfeePaymentInterface;
use App\Models\tender_invoice;

class tenderfeePaymentRepository implements tenderfeePaymentInterface{
    public function getPending($company)
    {
        return tender_invoice::with('currency','receipts')->where(['company_id'=>$company->id,'status'=>'PENDING'])->get();
    }

    public function getPendingByType($company,$type){
      
        return tender_invoice::with(['currency','tender','receipts'=>function($query)use($type){
        $query->where('type','=',$type);
        }])
        ->wherecompany_id($company->id)
        ->wherestatus('PENDING') 
        ->wheretype($type)
        ->get();
    }

    public function getAwaiting($company)
    {
        return tender_invoice::with('currency','rtgs','receipts','entity')->where(['company_id'=>$company->id,'status'=>'AWAITING'])->get();
    }

    public function getInvoices($company){
        return tender_invoice::with('currency','rtgs','receipts','entity')->where(['company_id'=>$company->id])->get();
   
    }

    public function removeitem($invoicenumber,$company)
    {
           $invoice = tender_invoice::where(['invoice_number'=>$invoicenumber,'company_id'=>$company->id,'status'=>'PENDING'])->get();
           if(count($invoice)>0){
                  tender_invoice::where(['invoice_number'=>$invoicenumber,'company_id'=>$company->id,'status'=>'PENDING'])->delete();
                  return array('status'=>'successMessage','message'=>'Invoice Successfully Deleted');
           }else{
               return array('status'=>'errorMessage','message'=>'No pending invoices found');
           }
    }

    public function settleusingsuspense($company,$type){

    }
}
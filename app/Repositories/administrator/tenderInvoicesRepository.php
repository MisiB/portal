<?php
namespace App\Repositories\administrator;

use App\Helpers\generalHelper;
use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use App\Models\tender_invoice;
use Illuminate\Support\Facades\Log;

class tenderInvoicesRepository{

    public function getInvoiceData($invoicenumber,$type){

        return tender_invoice::with(['receipts'=>function($query)use($type){
        $query->where('type','=',$type);
        },'currency'])->wheretype($type)->whereinvoice_number($invoicenumber)->get();
    }

    public function checkSettlement($invoicenumber){
     Log::info($invoicenumber);
     $invoice = tender_invoice::with('receipts','currency')->whereinvoice_number($invoicenumber)->get(); 
     Log::info($invoice);   
     $HELPER = new generalHelper();
     $totalinvoiced = $invoice->sum('amount');
     $totalreceipted = count($invoice[0]->receipts)>0 ? $invoice[0]->receipts->sum('amount') : 0;

     $balance = $totalinvoiced-$totalreceipted;
      Log::info($balance);
     if($balance == 0)
     {
       foreach ($invoice as $key => $value) 
       {
        $code = $HELPER->helper_generate_tender_code($value->company_id,$value->type);
        Log::info($value->description);
         if($value->description ==='BIDBOND')
         {
            $bid=mybidbonds::where(['tendernumber'=>$value->tendernumber,'company_id'=>$value->company_id,'paymentstatus'=>'PENDING'])->first();
            $bid->paymentstatus ='PAID';
            $bid->code = $code;
            $bid->save();
         }elseif ($value->description ==='ADMINISTRATION FEE :ESTABLISHMENT FEE')
          {
            Log::info($value->company_id);
            Log::info($value->tendernumber);
            Log::info($value->description);
            $admin= myadministrationfees::where(['company_id'=>$value->company_id,'tendernumber'=>$value->tendernumber,'description'=>$value->description,'paymentstatus'=>'PENDING'])->first();
            $admin->code = $code;
            $admin->paymentstatus ="PAID";
            $admin->save();


         }
         $value->status = 'PAID';
         $value->save();
       } 
       return array('status'=>'success');
     }else{
         return array('status'=>'pending');
     }
    }
}
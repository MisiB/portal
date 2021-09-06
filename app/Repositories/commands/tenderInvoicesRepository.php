<?php
namespace App\Repositories\commands;

use App\Helpers\generalHelper;
use App\Models\nonrefundable_invoices;
use App\Models\receipts;
use App\Models\rtgs;
use App\Models\statement;
use App\Models\suspense_receipts;
use App\Models\suspense;
use App\Models\tender_invoice;
use App\Notifications\tenderpaymentNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Repositories\suspenseRepository;
class tenderInvoicesRepository{

     public function getList(){
      $invoices = tender_invoice::wherestatus('AWAITING')->get();
       $helper = new generalHelper();
      if(count($invoices)>0)
        {
            foreach ($invoices as $key => $value) {
                $rtgs = rtgs::whereinvoice_number($value->invoice_number)->wheretype($value->type)->wherestatus('APPROVED')->get();
              
                $currency = $value->currency->name;
                if(count($rtgs)>0){
                    foreach ($rtgs as $ky => $val) 
                    {
                        $suspense =  $val->banktransaction->suspense;
                        Log::info('suspense:'.$suspense);
                        if(!is_null($suspense))
                        {
                         $suspenseAmount  = $suspense->amount;
                         $suspenseReceipted = count($suspense->suspenseReceipts)>0  ? $suspense->suspenseReceipts()->sum('amount') : 0;
                         $suspensebalance = $suspenseAmount - $suspenseReceipted;
                         Log::info('suspense balance:'.$suspensebalance);
                            if($suspensebalance>0)
                            {
                                $invoice_balance = $this->getBalance($value->invoice_number,$value->type);
                                $due =  $invoice_balance > $suspensebalance ? $suspensebalance : $invoice_balance; 
                                Log::info('amount due:'.$due);
                                if($due>0)
                                {
                                    statement::firstOrCreate(['identifier'=>$value->invoice_number,'type'=>$value->type],['company_id'=>$value->company_id,'identifier'=>$value->invoice_number,'source'=>'tender_invoices','description'=>$value->description,'type'=>$value->type,'flag'=>'DR','currency'=>$currency,'amount'=>$value->amount]);
                                
                                    $uuid = Str::uuid();
                                    $receiptnumber = $helper->get_receipt_number();
                                    $suspense_receipt= suspense_receipts::create(['suspense_id'=>$suspense->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$currency,'amount'=>$due]);
                                    $receipt = receipts::create(['invoicenumber'=>$value->invoice_number,'receiptnumber'=>$receiptnumber,'type'=>$value->type,'description'=>$value->description,'company_id'=>$value->company_id,'method'=>'suspense','source_id'=>$suspense_receipt->id,'currency'=>$currency,'amount'=>$due,'user_id'=>$val->user_id]);
                                    statement::create(['company_id'=>$value->company_id,'type'=>$value->type,'identifier'=>$uuid,'source'=>'suspense_receipts','description'=>$value->description,'flag'=>'CR','currency'=>$currency,'amount'=>$due]);
                                    if($due == $suspensebalance)
                                    {
                                    $suspense->status ='UTILIZED';
                                    $suspense->save();
                                    }
                                    Log::info($invoice_balance);
                                    Log::info($due);
                                    if($invoice_balance == $due){
                                        $helper->registerTenderfee($value->id);
                                    }
                                }
                            }                     
                        }
                    }
                }
            }
        }

     }

     public function processtenderinvoice($inv){
        $invoices = tender_invoice::wherestatus('AWAITING')->whereinvoice_number($inv)->get();
         $helper = new generalHelper();
        if(count($invoices)>0)
          {
              foreach ($invoices as $key => $value) {
                  $rtgs = rtgs::whereinvoice_number($value->invoice_number)->wheretype($value->type)->wherestatus('APPROVED')->get();
                
                  $currency = $value->currency->name;
                  if(count($rtgs)>0){
                      foreach ($rtgs as $ky => $val) 
                      {
                          $suspense =  $val->banktransaction->suspense;
                          if(!is_null($suspense))
                          {
                           $suspenseAmount  = $suspense->amount;
                           $suspenseReceipted = count($suspense->suspenseReceipts)>0  ? $suspense->suspenseReceipts()->sum('amount') : 0;
                           $suspensebalance = $suspenseAmount - $suspenseReceipted;
                              if($suspensebalance>0)
                              {
                                  $invoice_balance = $this->getBalance($value->invoice_number,$value->type);
                                  $due =  $invoice_balance > $suspensebalance ? $suspensebalance : $invoice_balance; 
                              
                                  if($due>0)
                                  {
                                      statement::firstOrCreate(['identifier'=>$value->invoice_number,'type'=>$value->type],['company_id'=>$value->company_id,'identifier'=>$value->invoice_number,'source'=>'tender_invoices','description'=>$value->description,'type'=>$value->type,'flag'=>'DR','currency'=>$currency,'amount'=>$value->amount]);
                                  
                                      $uuid = Str::uuid();
                                      $receiptnumber = $helper->get_receipt_number();
                                      $suspense_receipt= suspense_receipts::create(['suspense_id'=>$suspense->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$currency,'amount'=>$due]);
                                      $receipt = receipts::create(['invoicenumber'=>$value->invoice_number,'receiptnumber'=>$receiptnumber,'type'=>$value->type,'description'=>$value->description,'company_id'=>$value->company_id,'method'=>'suspense','source_id'=>$suspense_receipt->id,'currency'=>$currency,'amount'=>$due,'user_id'=>$val->user_id]);
                                      statement::create(['company_id'=>$value->company_id,'type'=>$value->type,'identifier'=>$uuid,'source'=>'suspense_receipts','description'=>$value->description,'flag'=>'CR','currency'=>$currency,'amount'=>$due]);
                                      if($due == $suspensebalance)
                                      {
                                      $suspense->status ='UTILIZED';
                                      $suspense->save();
                                      }
                                      if($invoice_balance == $due){
                                          $helper->registerTenderfee($value->id);

                                          return array('status'=>'successMessage','message'=>'Tender fee successfully paid');
                                      }else{
                                        return array('status'=>'successMessage','message'=>'Tender fee Receipted but  invoice has not yet been settled');    
                                      }
                                  }
                              }                     
                          }
                      }
                  }
              }
          }
  
       }


     public function processtenderid($id){
        $invoices = tender_invoice::wherestatus('AWAITING')->whereid($id)->get();
         $helper = new generalHelper();
        if(count($invoices)>0)
          {
              foreach ($invoices as $key => $value) {
                     $currency = $value->currency->name;
                     $company = $value->company;
                     $accountnumbers = $helper->get_account_numbers($currency,$value->type);
     
                     $wallet =0;
                     if(count($accountnumbers)==0)
                       {
                       
                       return  array('status'=>'errorMessage','message'=>'No Account number found');
                       }  
                         foreach ($accountnumbers as $key => $accountnumber) {
                            $suspense =  suspense::wherecompany_id($company->id)
                            ->whereIn('source',['banktransactions','suspensetransfer'])
                            ->wherestatus('PENDING')
                            ->whereaccountnumber($accountnumber->accountnumber)
                            ->first();
      if(!is_null($suspense))
      {
       $suspenseAmount  = $suspense->amount;
       $suspenseReceipted = count($suspense->suspenseReceipts)>0  ? $suspense->suspenseReceipts()->sum('amount') : 0;
       $suspensebalance = $suspenseAmount - $suspenseReceipted;
          if($suspensebalance>0)
          {
              $invoice_balance = $this->getBalance($value->invoice_number,$value->type);
              $due =  $invoice_balance > $suspensebalance ? $suspensebalance : $invoice_balance; 
              
              if($due>0)
              {
                  statement::firstOrCreate(['identifier'=>$value->invoice_number,'type'=>$value->type],['company_id'=>$value->company_id,'identifier'=>$value->invoice_number,'source'=>'tender_invoices','description'=>$value->description,'type'=>$value->type,'flag'=>'DR','currency'=>$currency,'amount'=>$value->amount]);
              
                  $uuid = Str::uuid();
                  $receiptnumber = $helper->get_receipt_number();
                  $suspense_receipt= suspense_receipts::create(['suspense_id'=>$suspense->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$currency,'amount'=>$due]);
                  $receipt = receipts::create(['invoicenumber'=>$value->invoice_number,'receiptnumber'=>$receiptnumber,'type'=>$value->type,'description'=>$value->description,'company_id'=>$value->company_id,'method'=>'suspense','source_id'=>$suspense_receipt->id,'currency'=>$currency,'amount'=>$due,'user_id'=>Auth::guard('admin')->user()->id]);
                  statement::create(['company_id'=>$value->company_id,'type'=>$value->type,'identifier'=>$uuid,'source'=>'suspense_receipts','description'=>$value->description,'flag'=>'CR','currency'=>$currency,'amount'=>$due]);
                  if($due == $suspensebalance)
                  {
                  $suspense->status ='UTILIZED'; 
                  $suspense->save();
                  }
                  if($invoice_balance == $due){
                      $helper->manualregisterTenderfee($value->id);
                       $user =   $invoices[0]->company->users[0];
                        if(!is_null($user)){
                            $message = "Dear ".$user->name." ".$user->surname." your  ".$invoices[0]->description." certificate for tender number ".$invoices[0]->tendernumber." has been processed";
                            $user->notify(new tenderpaymentNotification($message));
                        }
                      return array('status'=>'successMessage','message'=>'Tender fee successfully paid');
                  }else{
                    return array('status'=>'successMessage','message'=>'Tender fee Receipted but  invoice has not yet been settled');    
                  }
              }
          }                     
      }
                         }
                       
                   
              }
          }
  
       }

    /*
       public function processtenderid($id){
        $invoices = tender_invoice::wherestatus('AWAITING')->whereid($id)->get();
         $helper = new generalHelper();
        if(count($invoices)>0)
          {
              foreach ($invoices as $key => $value) {
                     $currency = $value->currency->name;
                     $company = $value->company;
                     $accountnumber = $helper->getAccountNumber($company,$currency,$value->type);
     
                     $wallet =0;
                     if(count($accountnumber)==0)
                       {
                       
                       return  array('status'=>'errorMessage','message'=>'No Account number found');
                       }  
                          $suspense =  suspense::wherecompany_id($company->id)
                                                ->wheresource('banktransactions')
                                                ->wherestatus('PENDING')
                                                ->whereaccountnumber($accountnumber[0]['accountnumber'])
                                                ->first();
                          if(!is_null($suspense))
                          {
                           $suspenseAmount  = $suspense->amount;
                           $suspenseReceipted = count($suspense->suspenseReceipts)>0  ? $suspense->suspenseReceipts()->sum('amount') : 0;
                           $suspensebalance = $suspenseAmount - $suspenseReceipted;
                              if($suspensebalance>0)
                              {
                                  $invoice_balance = $this->getBalance($value->invoice_number,$value->type);
                                  $due =  $invoice_balance > $suspensebalance ? $suspensebalance : $invoice_balance; 
                                  
                                  if($due>0)
                                  {
                                      statement::firstOrCreate(['identifier'=>$value->invoice_number,'type'=>$value->type],['company_id'=>$value->company_id,'identifier'=>$value->invoice_number,'source'=>'tender_invoices','description'=>$value->description,'type'=>$value->type,'flag'=>'DR','currency'=>$currency,'amount'=>$value->amount]);
                                  
                                      $uuid = Str::uuid();
                                      $receiptnumber = $helper->get_receipt_number();
                                      $suspense_receipt= suspense_receipts::create(['suspense_id'=>$suspense->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$currency,'amount'=>$due]);
                                      $receipt = receipts::create(['invoicenumber'=>$value->invoice_number,'receiptnumber'=>$receiptnumber,'type'=>$value->type,'description'=>$value->description,'company_id'=>$value->company_id,'method'=>'suspense','source_id'=>$suspense_receipt->id,'currency'=>$currency,'amount'=>$due,'user_id'=>Auth::guard('admin')->user()->id]);
                                      statement::create(['company_id'=>$value->company_id,'type'=>$value->type,'identifier'=>$uuid,'source'=>'suspense_receipts','description'=>$value->description,'flag'=>'CR','currency'=>$currency,'amount'=>$due]);
                                      if($due == $suspensebalance)
                                      {
                                      $suspense->status ='UTILIZED';
                                      $suspense->save();
                                      }
                                      if($invoice_balance == $due){
                                          $helper->manualregisterTenderfee($value->id);
                                           $user =   $invoices[0]->company->users[0];
                                            if(!is_null($user)){
                                                $message = "Dear ".$user->name." ".$user->surname." your  ".$invoices[0]->description." certificate for tender number ".$invoices[0]->tendernumber." has been processed";
                                                $user->notify(new tenderpaymentNotification($message));
                                            }
                                          return array('status'=>'successMessage','message'=>'Tender fee successfully paid');
                                      }else{
                                        return array('status'=>'successMessage','message'=>'Tender fee Receipted but  invoice has not yet been settled');    
                                      }
                                  }
                              }                     
                          }
                   
              }
          }
  
       }*/

     function getBalance($inv,$type){
         $invoice = tender_invoice::whereinvoice_number($inv)->wheretype($type)->get();
          //Log::info('invoices:'.$invoice);

         $receipts = receipts::whereinvoicenumber($inv)->wheretype($type)->get();
         //Log::info('receipts '.$receipts);
         $total_invoiced = $invoice->sum('amount');
         $total_receipted =  count($receipts)>0 ? $receipts->sum('amount') :0;
         return $total_invoiced-$total_receipted;
     }

}
<?php
namespace App\Repositories\commands;

use App\Helpers\generalHelper;
use App\Models\nonrefundable_invoices;
use App\Models\receipts;
use App\Models\rtgs;
use App\Models\statement;
use App\Models\suspense_receipts;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class supplierInvoicesRepository{

     public function getList(){
      $invoices = nonrefundable_invoices::wherestatus('AWAITING')->get();
       $helper = new generalHelper();
      if(count($invoices)>0){
          $grouped = $invoices->groupBy('invoice_number');
        
          $array =[];
          foreach ($grouped as $key => $value) {
              $total_invoiced = $value[0]->sum('cost');
              $currency = $value[0]->currency->name;
              $rtgs = rtgs::whereinvoice_number($key)->wherestatus('APPROVED')->get();
               if(count($rtgs)>0)
               {
                    foreach ($rtgs as $ky => $val) {
                       $suspense =  $val->banktransaction->suspense;
                       if(!is_null($suspense))
                       {
                        $suspenseAmount  = $suspense->amount;
                        $suspenseReceipted = count($suspense->suspenseReceipts)>0  ? $suspense->suspenseReceipts()->sum('amount') : 0;
                        $suspensebalance = $suspenseAmount - $suspenseReceipted;
                            if($suspensebalance>0)
                            {
                                $invoice_balance = $this->getBalance($key);
                                $due =  $invoice_balance > $suspensebalance ? $suspensebalance : $invoice_balance; 
                                if($due>0)
                                {                               
                                    statement::firstOrCreate(['identifier'=>$key],['company_id'=>$value[0]->company_id,'identifier'=>$key,'source'=>'nonrefundable_invoices','description'=>'invoicing','flag'=>'DR','currency'=>$currency,'amount'=>$total_invoiced]);
                                
                                    $uuid = Str::uuid();
                                    $receiptnumber = $helper->get_receipt_number();
                                    $suspense_receipt= suspense_receipts::create(['suspense_id'=>$suspense->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$currency,'amount'=>$due]);
                                    $receipt = receipts::create(['invoicenumber'=>$key,'receiptnumber'=>$receiptnumber,'type'=>$val->type,'description'=>'SUPPLIER','company_id'=>$value[0]->company_id,'method'=>'suspense','source_id'=>$suspense_receipt->id,'currency'=>$currency,'amount'=>$due,'user_id'=>$value[0]->user_id]);
                                    statement::create(['company_id'=>$value[0]->company_id,'type'=>$val->type,'identifier'=>$uuid,'source'=>'suspense_receipts','description'=>'supplier registration','flag'=>'CR','currency'=>$currency,'amount'=>$due]);
                                    if($due == $suspensebalance)
                                    {
                                    $suspense->status ='UTILIZED';
                                    $suspense->save();
                                    }
                                    
                                    if($invoice_balance == $due){
                                        $helper->registersupplier($key);
                                    }
                              }
                            }
                       }
                    }
              


              }
          }
       
          return $array;
      }

     }

     public function processRegistration($inv){
        $invoices = nonrefundable_invoices::wherestatus('AWAITING')->whereinvoice_number($inv)->get();
         $helper = new generalHelper();
        if(count($invoices)>0){
            $grouped = $invoices->groupBy('invoice_number');
          
            $array =[];
            foreach ($grouped as $key => $value) {
                $total_invoiced = $value[0]->sum('cost');
                $currency = $value[0]->currency->name;
                $rtgs = rtgs::whereinvoice_number($key)->wherestatus('APPROVED')->get();
                 if(count($rtgs)>0)
                 {
                      foreach ($rtgs as $ky => $val) {
                         $suspense =  $val->banktransaction->suspense;
                         if(!is_null($suspense))
                         {
                          $suspenseAmount  = $suspense->amount;
                          $suspenseReceipted = count($suspense->suspenseReceipts)>0  ? $suspense->suspenseReceipts()->sum('amount') : 0;
                          $suspensebalance = $suspenseAmount - $suspenseReceipted;
                              if($suspensebalance>0)
                              {
                                  $invoice_balance = $this->getBalance($key);
                                  $due =  $invoice_balance > $suspensebalance ? $suspensebalance : $invoice_balance; 
                                  if($due>0)
                                  {                               
                                      statement::firstOrCreate(['identifier'=>$key],['company_id'=>$value[0]->company_id,'identifier'=>$key,'source'=>'nonrefundable_invoices','description'=>'invoicing','flag'=>'DR','currency'=>$currency,'amount'=>$total_invoiced]);
                                  
                                      $uuid = Str::uuid();
                                      $receiptnumber = $helper->get_receipt_number();
                                      $suspense_receipt= suspense_receipts::create(['suspense_id'=>$suspense->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$currency,'amount'=>$due]);
                                      $receipt = receipts::create(['invoicenumber'=>$key,'receiptnumber'=>$receiptnumber,'type'=>$val->type,'description'=>'SUPPLIER','company_id'=>$value[0]->company_id,'method'=>'suspense','source_id'=>$suspense_receipt->id,'currency'=>$currency,'amount'=>$due,'user_id'=>$value[0]->user_id]);
                                      statement::create(['company_id'=>$value[0]->company_id,'type'=>$val->type,'identifier'=>$uuid,'source'=>'suspense_receipts','description'=>'supplier registration','flag'=>'CR','currency'=>$currency,'amount'=>$due]);
                                      if($due == $suspensebalance)
                                      {
                                      $suspense->status ='UTILIZED';
                                      $suspense->save();
                                      }
                                      if($invoice_balance == $due){
                                          $helper->registersupplier($key);
                                          return array('status'=>'successMessage','message'=>'Invoice successfully paid');
                                      }else{
                                        return array('status'=>'successMessage','message'=>'Invoice Receipted but  invoice has not yet been settled');    
                                      }
                                }
                              }
                         }
                      }
                
  
  
                }
            }
         
            return $array;
        }
  
       }

     function getBalance($inv){
         $invoice = nonrefundable_invoices::whereinvoice_number($inv)->get();
         $total_invoiced = $invoice->sum('cost');
         $total_receipted =  count($invoice[0]->receipts)>0 ? $invoice[0]->receipts()->sum('amount') :0;
         return $total_invoiced-$total_receipted;
     }

}
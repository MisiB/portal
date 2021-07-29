<?php
namespace App\Repositories;

use App\Helpers\generalHelper;
use App\Interfaces\bankpaymentsInterface;
use App\Interfaces\banktransactionsInterface;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Models\banktransactions;
use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use App\Models\statement;
use App\Models\suspense;
use App\Models\suspense_receipts;
use Illuminate\Support\Str;
use App\Models\receipts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class bankpaymentsRepository implements bankpaymentsInterface{

  
    private $transaction;
    private $invoice;
    public function __construct(banktransactionsInterface $transaction,supplier_invoicing_Interface $invoice)
    {
       
        $this->transaction = $transaction;
        $this->invoice = $invoice;
    }

    public function processAwaiting($company){
          
        $invoicedata = $this->invoice->getInvoices($company,['AWAITING']);
        $suspense = new suspenseRepository();
        $HELPER = new generalHelper();
        
      
        if(count($invoicedata)>0)
        {
           $totalinvoiced = $invoicedata->sum('cost');
           $totalpaid = $invoicedata[0]->receipts->sum('amount');
           $balance = $totalinvoiced - $totalpaid;
           if (!statement::whereidentifier($invoicedata[0]->invoice_number)->wheresource('nonrefundable_invoices')->exists()) {
            statement::create(['company_id' => $company->id, 'identifier' =>$invoicedata[0]->invoice_number, 'description' => 'Invoicing' , 'source' => 'nonrefundable_invoices', 'flag' => 'DR', 'amount' => $totalinvoiced]);
        }
           if($balance>0){ 
           
               $currency = $invoicedata[0]->currency->name;
               $accountnumber = $HELPER->getAccountNumber($company,$currency,'NONREFUNDABLE');
               $suspense_balance = 0;
               if(count($accountnumber)>0)
                     {
                       for ($i=0; $i < count($accountnumber); $i++) { 
                         $suspense_balance = $suspense_balance+$suspense->getBalance($company,$accountnumber[$i]['accountnumber']);
                       }

                       if($suspense_balance>0){
                            $receiptnumber = $HELPER->get_receipt_number();
                            $amount = $balance > $suspense_balance ? $suspense_balance : $balance;
                           
                             $suspensedata = suspense::wherecompany_id($company->id)->whereIn('accountnumber',$accountnumber)->wherestatus('PENDING')->get();
                              if(count($suspensedata)>0)
                              {
                                  foreach ($suspensedata as $key => $value) {
                                   $uuid = Str::uuid();
                                      $receipted = count($value->suspenseReceipts)>0 ? $value->suspenseReceipts->sum('amount') : 0;
                                       $remaining = $value->amount - $receipted;
                                       if($remaining >0){
                                        if($remaining <= $amount){
                                       $value->status ='UTILIZED';
                                       $value->save();
                                       $amount = $remaining;
                                   }
                               
                                   $suspense_receipt =  suspense_receipts::create(['suspense_id'=>$value->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$currency,'amount'=>$amount]);
                             
                                   receipts::firstOrCreate(
                                     ['source_id' => $suspense_receipt->id, 'method' =>'suspense'],
                                     ['invoicenumber' =>$invoicedata[0]->invoice_number,
                                         'receiptnumber' =>$receiptnumber,
                                         'source_id' =>$suspense_receipt->id,
                                         'company_id' =>$company->id,
                                         'method' =>'suspense',
                                         'currency' =>$currency,
                                         'amount' =>$amount,
                                         'user_id' =>Auth::user()->id
                                     ]
                                 );
                                 if (!statement::whereidentifier($uuid)->wheresource('receipts')->exists()) {
                                    statement::create(['company_id' => $company->id, 'identifier' => $uuid, 'description' => 'RECEIPTING: suspense' , 'source' => 'suspense', 'flag' => 'CR', 'amount' => $amount]);
                                }
                               }
                                 
                                  }
                         
                       }
                           $status = $this->invoice->check_invoice_status($invoicedata[0]->invoice_number);
                           $message="";
                           if ($status == 'APPROVED') {
                               $message = 'Registration successfully completed please download your registration certificates';
                           } elseif ($status == 'PENDING') {
                               $message = 'Registration successfully completed. Your company documents awaiting verification this may take 24 - 48 hours from day of  process completion. Please this excludes registrations done on weekends';
                           } else {
                               $message = 'Payment of ' . $amount . ' was successfully receipt please clear balance to complete registration';
                           }
                           $code ='successMessage';
                           return array('status'=>$code,'message'=>$message);

                       }else{
                           return array('status'=>'errorMessage','message'=>'INSUFFICIENT BALANCE IN SUSPENSE ACCOUNT') ;     
                       }
                    
                     }else{
                       return array('status'=>'errorMessage','message'=>'No account number found') ;   
                     }




           }else{
               return array('status'=>'errorMessage','message'=>'No Outstanding Invoice Found') ;    
           }

        }
        else
        {
         return array('status'=>'errorMessage','message'=>'No Pending Invoice Found') ;   
        } 
    }
    public function process($company)
    {
        
        
         $invoicedata = $this->invoice->getInvoice($company);
         $suspense = new suspenseRepository();
         $HELPER = new generalHelper();
         
       
         if(count($invoicedata)>0)
         {
            $totalinvoiced = $invoicedata->sum('cost');
            $totalpaid = $invoicedata[0]->receipts->sum('amount');
            $balance = $totalinvoiced - $totalpaid;
            if (!statement::whereidentifier($invoicedata[0]->invoice_number)->wheresource('nonrefundable_invoices')->exists()) {
                statement::create(['company_id' => $company->id, 'identifier' =>$invoicedata[0]->invoice_number, 'description' => 'Invoicing' , 'source' => 'nonrefundable_invoices', 'flag' => 'DR', 'amount' =>$totalinvoiced]);
            }
            if($balance>0){ 
            
                $currency = $invoicedata[0]->currency->name;
                $accountnumber = $HELPER->getAccountNumber($company,$currency,'NONREFUNDABLE');
                $suspense_balance = 0;
                if(count($accountnumber)>0)
                      {
                        for ($i=0; $i < count($accountnumber); $i++) { 
                          $suspense_balance = $suspense_balance+$suspense->getBalance($company,$accountnumber[$i]['accountnumber']);
                        }

                        if($suspense_balance>0){
                             $receiptnumber = $HELPER->get_receipt_number();
                             $amount = $balance > $suspense_balance ? $suspense_balance : $balance;
                            
                              $suspensedata = suspense::wherecompany_id($company->id)->whereIn('accountnumber',$accountnumber)->wherestatus('PENDING')->get();
                               if(count($suspensedata)>0)
                               {
                                   foreach ($suspensedata as $key => $value) {
                                    $uuid = Str::uuid();
                                       $receipted = count($value->suspenseReceipts)>0 ? $value->suspenseReceipts->sum('amount') : 0;
                                        $remaining = $value->amount - $receipted;
                                        if($remaining >0){
                                         if($remaining <= $amount){
                                        $value->status ='UTILIZED';
                                        $value->save();
                                        $amount = $remaining;
                                    }
                                
                                    $suspense_receipt =  suspense_receipts::create(['suspense_id'=>$value->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$currency,'amount'=>$amount]);
                              
                                    receipts::firstOrCreate(
                                      ['source_id' => $suspense_receipt->id, 'method' =>'suspense'],
                                      ['invoicenumber' =>$invoicedata[0]->invoice_number,
                                          'receiptnumber' =>$receiptnumber,
                                          'source_id' =>$suspense_receipt->id,
                                          'company_id' =>$company->id,
                                          'method' =>'suspense',
                                          'currency' =>$currency,
                                          'amount' =>$amount,
                                          'user_id' =>Auth::user()->id
                                      ] 
                                  );
                                  if (!statement::whereidentifier($uuid)->wheresource('receipts')->exists()) {
                                      statement::create(['company_id' => $company->id, 'identifier' => $uuid, 'description' => 'RECEIPTING: suspense' , 'source' => 'suspense', 'flag' => 'CR', 'amount' => $amount]);
                                  }
                                }
                                  
                                   }
                          
                        }
                            $status = $this->invoice->check_invoice_status($invoicedata[0]->invoice_number);
                            $message="";
                            if ($status == 'APPROVED') {
                                $message = 'Registration successfully completed please download your registration certificates';
                            } elseif ($status == 'PENDING') {
                                $message = 'Registration successfully completed. Your company documents awaiting verification this may take 24 - 48 hours from day of  process completion. Please this excludes registrations done on weekends';
                            } else {
                                $message = 'Payment of ' . $amount . ' was successfully receipt please clear balance to complete registration';
                            }
                            $code ='successMessage';
                            return array('status'=>$code,'message'=>$message);

                        }else{
                            return array('status'=>'errorMessage','message'=>'INSUFFICIENT BALANCE IN SUSPENSE ACCOUNT') ;     
                        }
                     
                      }else{
                        return array('status'=>'errorMessage','message'=>'No account number found') ;   
                      }




            }else{
                return array('status'=>'errorMessage','message'=>'No Outstanding Invoice Found') ;    
            }

         }
         else
         {
          return array('status'=>'errorMessage','message'=>'No Pending Invoice Found') ;   
         }

    }

    public function processMobile($company)
    {
        
        
         $invoicedata = $this->invoice->getInvoice($company);
         $suspense = new suspenseRepository();
         $HELPER = new generalHelper();
         
       
         if(count($invoicedata)>0)
         {
            $totalinvoiced = $invoicedata->sum('cost');
            $totalpaid = $invoicedata[0]->receipts->sum('amount');
            $balance = $totalinvoiced - $totalpaid;
            if (!statement::whereidentifier($invoicedata[0]->invoice_number)->wheresource('nonrefundable_invoices')->exists()) {
                statement::create(['company_id' => $company->id, 'identifier' =>$invoicedata[0]->invoice_number, 'description' => 'Invoicing' , 'source' => 'nonrefundable_invoices', 'flag' => 'DR', 'amount' =>$totalinvoiced]);
            }
            if($balance>0){ 
            
                $currency = $invoicedata[0]->currency->name;
                $accountnumber = $HELPER->getAccountNumber($company,$currency,'NONREFUNDABLE');
                $suspense_balance = 0;
                if(count($accountnumber)>0)
                      {
                         
                        for ($i=0; $i < count($accountnumber); $i++) { 
                          $suspense_balance = $suspense_balance+$suspense->getBalance($company,$accountnumber[$i]['accountnumber']);
                        }

                        if($suspense_balance>0){
                             $receiptnumber = $HELPER->get_receipt_number();
                             $amount = $balance > $suspense_balance ? $suspense_balance : $balance;
                            
                              $suspensedata = suspense::wherecompany_id($company->id)->whereIn('accountnumber',$accountnumber)->wherestatus('PENDING')->get();
                               if(count($suspensedata)>0)
                               {
                                   foreach ($suspensedata as $key => $value) {
                                    $uuid = Str::uuid();
                                       $receipted = count($value->suspenseReceipts)>0 ? $value->suspenseReceipts->sum('amount') : 0;
                                        $remaining = $value->amount - $receipted;
                                        if($remaining >0){
                                         if($remaining <= $amount){
                                        $value->status ='UTILIZED';
                                        $value->save();
                                        $amount = $remaining;
                                    }
                                
                                    $suspense_receipt =  suspense_receipts::create(['suspense_id'=>$value->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$currency,'amount'=>$amount]);
                              
                                    receipts::firstOrCreate(
                                      ['source_id' => $suspense_receipt->id, 'method' =>'suspense'],
                                      ['invoicenumber' =>$invoicedata[0]->invoice_number,
                                          'receiptnumber' =>$receiptnumber,
                                          'source_id' =>$suspense_receipt->id,
                                          'company_id' =>$company->id,
                                          'method' =>'suspense',
                                          'currency' =>$currency,
                                          'amount' =>$amount,
                                          'user_id' =>Auth::user()->id
                                      ] 
                                  );
                                  if (!statement::whereidentifier($uuid)->wheresource('receipts')->exists()) {
                                      statement::create(['company_id' => $company->id, 'identifier' => $uuid, 'description' => 'RECEIPTING: suspense' , 'source' => 'suspense', 'flag' => 'CR', 'amount' => $amount]);
                                  }
                                }
                                  
                                   }
                          
                        }
                            $status = $this->invoice->check_invoice_status($invoicedata[0]->invoice_number);
                            $message="";
                            $code ='successMessage';
                            if ($status == 'APPROVED') {
                                $message = 'Registration successfully completed please download your registration certificates';
                               
                            } elseif ($status == 'PENDING') {
                                $message = 'Registration successfully completed. Your company documents awaiting verification this may take 24 - 48 hours from day of  process completion. Please this excludes registrations done on weekends';
                            } else {
                                $code ='incomplete';
                                $message = 'Payment of ' . $amount . ' was successfully receipt please clear balance to complete registration';
                            }
                          
                            return array('status'=>$code,'message'=>$message);

                        }else{
                            return array('status'=>'errorMessage','message'=>'INSUFFICIENT BALANCE IN SUSPENSE ACCOUNT') ;     
                        }
                     
                      }else{
                        return array('status'=>'errorMessage','message'=>'No account number found') ;   
                      }




            }else{
                return array('status'=>'errorMessage','message'=>'No Outstanding Invoice Found') ;    
            }

         }
         else
         {
          return array('status'=>'errorMessage','message'=>'No Pending Invoice Found') ;   
         }

    }

    public function tenderprocessing($company,$type){
       
        /**
         * 1)  pending invoice
         * 2) compute total  invoice
         * 3) get total receipted
         * 4) get pending suspense data
         * 5) loop through  suspense data  and update utilized suspense entry 
         */

         $HELPER = new generalHelper();

         $suspense = new suspenseRepository();

         $payment = new tenderfeePaymentRepository();

          $invoices = $payment->getPendingByType($company,$type);       
          if(count($invoices)>0){
         
                  $accountnumber = $HELPER->getAccountNumber($company,$invoices[0]->currency->name,$type);
                  $suspensedata = suspense::wherecompany_id($company->id)->whereIn('accountnumber',$accountnumber)->wherestatus('PENDING')->get();
                  foreach ($suspensedata as $key => $value)
                   {
                    
                    /**
                     * get the total receipted  for a  given  suspense transaction
                     */
                    $receipted = count($value->suspenseReceipts)>0 ? $value->suspenseReceipts->sum('amount') : 0;

                    /**
                     * get the remaining balance in   transaction
                     */
                    $remaining_balance = $value->amount - $receipted;
                   /**
                    * get current invoice outstanding balance 
                    */
                    $totalDue =  $this->getInvoicebalance($company,$type);
                     if($totalDue >0)
                     {
                    if($remaining_balance < $totalDue){
                        $value->status ='UTILIZED';
                        $value->save();
                    }
                    
                    $amount = $this->calculate_receipting_balance($remaining_balance,$totalDue);

                   /**
                    * get receipt number;
                    */
                    $receiptnumber = $HELPER->get_receipt_number();

                    /**
                     * receipting in the suspense receipt table and the receipt table
                     */


                    $uuid = Str::uuid();


                    $suspense_receipt =  suspense_receipts::create(['suspense_id'=>$value->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$invoices[0]->currency->name,'amount'=>$amount]);
                              
                    receipts::firstOrCreate(
                        ['source_id' => $suspense_receipt->id, 'method' =>'suspense'],
                        ['invoicenumber' =>$invoices[0]->invoice_number,
                            'receiptnumber' =>$receiptnumber,
                            'type'=>$type,
                            'description'=>$invoices[0]->description,
                            'source_id' =>$suspense_receipt->id,
                            'company_id' =>$company->id,
                            'method' =>'suspense',
                            'currency' =>$invoices[0]->currency->name,
                            'amount' =>$amount,
                            'user_id' =>Auth::user()->id
                    ]);


                    /**
                     * check if invoice has been settled
                     */

                    $totalDue =  $this->getInvoicebalance($company,$type);

                    if($totalDue ==0){
                      
                        /** 
                         * if  invoice has  been fully paid
                         *  loop through the  invoice and invoice and generate corresponding letters
                         * 
                         *  */
                       foreach ($invoices as $key => $value)
                        {
                            $code = $HELPER->helper_generate_tender_code($company->id,$type);
                            $uuid = Str::uuid();
                           if($value->type=='REFUNDABLE' && $value->description =='BIDBOND'){
                               
                               mybidbonds::create(['company_id'=>$company->id,
                                                'entity_id'=>$value->tender->entity_id,
                                                'uuid'=>$uuid,
                                                'tendernumber'=>$value->tendernumber,
                                                'close_date'=>$value->tender->close_date,
                                                'validityperiod'=>$value->tender->validityperiod,
                                                'maturitydate'=>Carbon::parse($value->tender->close_date)->addDays($value->tender->validityperiod),
                                                'amount'=>$value->amount,
                                                 'currency'=>$value->currency->name,
                                                'paymentstatus'=>'PAID',
                                                'code'=>$code
                                                ]);
                           
                             
                           }else{
                           myadministrationfees::create(['company_id'=>$company->id,'entity_id'=>$value->tender->entity_id,'tendernumber'=>$value->tendernumber,'description'=>$value->description,'currency_id'=>$value->currency_id,'amount'=>$value->amount,'code'=>$code,'paymentstatus'=>'PAID']);
                           
                           }

                           $value->status = 'PAID';
                           $value->save();
                        }

                      return array('status'=>'successMessage','message'=>'Bid bond and administratin fee successfully settled','code'=>'completed');

                    }
                          

                }
                    
                   }         
                   return array('status'=>'successMessage','message'=>'Amount receipted how please settle the outstanding amount to complete the application process','code'=>'incomplete');
             
              
          }
          else{
              return array('status'=>'errorMessage','message'=>'No pending invoices found','state'=>'notfound');
          }


    }

    function get_suspense_balance($company,$invoice,$type){
        $HELPER = new generalHelper();

         $suspense = new suspenseRepository();
        $accountnumber = $HELPER->getAccountNumber($company,$invoice[0]->currency->name,$type);
        $balance=0;
       if(count($accountnumber)>0)
         {
           for ($i=0; $i < count($accountnumber); $i++) { 
            $balance = $balance+$suspense->getBalance($company,$accountnumber[$i]['accountnumber']);
           }
        
         }

         return $balance;
    }

    function getInvoicebalance($company,$type){
        $payment = new tenderfeePaymentRepository();
        $invoices = $payment->getPendingByType($company,$type);
        if(count($invoices)>0)
        {
        $totalinvoiced = $invoices->sum('amount');
        $totalreceipted = count($invoices[0]->receipts) >0 ? $invoices[0]->receipts->sum('amount') : 0;
        return $totalinvoiced - $totalreceipted;
        }
        else{
            return 0;
        }
    }

    function calculate_receipting_balance($remaining_balance,$totalDue){
        $receipting_amount =0;
        if($remaining_balance <= $totalDue)
        {
           $receipting_amount = $remaining_balance;
        }
        else{
          $receipting_amount = $totalDue;
        }

        return $receipting_amount;
    }

   
}
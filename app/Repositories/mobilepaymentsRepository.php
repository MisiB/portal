<?php


namespace App\Repositories;


use App\Helpers\generalHelper;
use App\Http\Requests\mobilepaymentsRequest;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Models\onlinepayments;
use App\Models\receipts;
use App\Models\statement;
use App\Models\User;
use App\Notifications\paymentNotification;
use App\Notifications\registrationNotification;
use http\Exception\BadMessageException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use mysql_xdevapi\Exception;
use App\Repositories\suspenseRepository;
class mobilepaymentsRepository implements \App\Interfaces\mobilepaymentsInterface
{
  private $HELPER;
  private $invoicing;
  private $suspense;
  public function __construct(generalHelper $helper,supplier_invoicing_Interface $invoicing,suspenseRepository $suspense){
      $this->HELPER = $helper;
      $this->invoicing = $invoicing;
      $this->suspense = $suspense;
  }
    public function intitate(mobilepaymentsRequest $request, $company)
    {
          $paynow = $this->HELPER->paynowMobile();
          $invoice = $this->invoicing->getInvoice($company);
          if(count($invoice)>0){
              $invoice_number = $invoice[0]->invoice_number;
              $this->HELPER->check_invoice_settlement($invoice[0]->invoice_number,Auth::user()->email);
              $status = $this->HELPER->check_invoice_status($invoice[0]->invoice_number);
              $balance = $this->HELPER->get_invoice_balance($invoice[0]->invoice_number);
              if($balance >= $request->amount)
              {
              if($status =='INCOMPLETE')
              {
              $email =$this->HELPER->getEmail();
              $payment = $paynow->createPayment($invoice_number,$email);
              $payment->add($invoice_number,$request->amount);
              try {
                  $response = $paynow->sendMobile($payment,$request->phone,$request->mode);
                  if($response->success()){
                      $pollUrl = $response->pollUrl();
                      $online= onlinepayments::create(['invoice_number'=>$invoice_number,
                          'company_id'=>Auth::user()->company->id,
                          'poll_url'=>$pollUrl,
                          'amount'=>$request->amount,
                          'mode'=>$request->mode,
                          'status'=>'PENDING'
                      ]);
                      return array('status'=>'success','data'=>$online,'message'=>'Payment successfully initiated');

                  }else{
                    return array('status'=>'error','data'=>[],'message'=>'Failed to'.$response->data());  
                  }
              }catch (Exception $e){
                  return array('status'=>'error','data'=>[],'message'=>$e->getMessage());
              }
            }else{
                return array('status'=>'settled','data'=>[],'message'=>'Invoiced already settled'); 
            }
          }else{
            return array('status'=>'error','data'=>[],'message'=>'Over payment detected Amount due on invoice :$'.$balance);    
          }

          }else{
              return array('status'=>'error','data'=>[],'message'=>'No pending invoice found');
          }

    }

    public function confirm($id,$company)
    {
        $payment = onlinepayments::whereid($id)->first();
        $invoice = $this->invoicing->getInvoice($company);
        if(count($invoice)>0) {
            $users = User::wherecompany_id($invoice[0]->company_id)->get();
            $message ='';
            $code='';
            $invoice_number = $invoice[0]->invoice_number;
            $total_invoiced = $invoice->sum('cost');
            if(!is_null($payment)){
                /** check if onlinepayment was receipt */
                    $paynow = $this->HELPER->paynowMobile();
                    if(strtoupper($payment->mode)=='PAYNOW')
                     {
                       $paynow = $this->HELPER->paynowOnline();
                     }
                    try {
                        $status = $paynow->pollTransaction($payment->poll_url);
                        if (!empty($status))
                        {
                            /*if (strtoupper($status->status()) == 'PAID' || strtoupper($status->status()) == 'AWAITING DELIVERY') {
                                $payment->status = $status->status();
                                $payment->save();
                                $accountnumber = $this->HELPER->getAccountNumber($company,$payment->invoice->currency->name,'NONREFUNDABLE');
                                $args = array("banktransaction_id"=>$payment->id,'source'=>$payment->mode,'company_id'=>$payment->company_id,'accountnumber'=>$accountnumber[0]['accountnumber'],'currency'=>$payment->invoice->currency->name,'amount'=>$payment->amount);
                                 $this->suspense->captureMobile($args);
                                $code='successMessage';
                                 $message='Wallet Successfully Topped Up Please click Settle Button to settle Invoice';
               

                            } elseif (strtoupper($status->status()) == 'SENT' || strtoupper($status->status()) == 'CANCELLED') {
                                $payment->status = $status->status();
                                $payment->save();
                                $message = ' Your payment attempt was ' . $status->status();
                                $code = 'errorMessage';

                            } else {
                                $message='Failed to completed please retry';
                                }
                        Notification::send($users, new paymentNotification($message));
                            return array('status'=>$code,'message'=>$message);*/

                            if (strtoupper($status->status()) == 'PAID' || strtoupper($status->status()) == 'AWAITING DELIVERY') {
                                $payment->status = $status->status();
                                $payment->save();
                                $receiptnumber = $this->HELPER->get_receipt_number();
                                receipts::firstOrCreate(
                                    ['source_id' => $payment->id, 'method' => $payment->mode],
                                    ['invoicenumber' => $payment->invoice_number,
                                        'receiptnumber' => $receiptnumber,
                                        'source_id' => $payment->id,
                                        'company_id' => $payment->company_id,
                                        'method' => $payment->mode,
                                        'currency' => $payment->invoice->currency->name,
                                        'amount' => $payment->amount,
                                        'user_id' => Auth::user()->id
                                    ]
                                );

                                $statement = statement::whereidentifier($invoice_number)->wheresource('nonrefundable_invoices')->first();
                                if (!is_null($statement)) {
                                    if ($statement->amount != $total_invoiced) {
                                        $statement->amount = $total_invoiced;
                                        $statement->save();
                                    }
                                } else {
                                    statement::create(['company_id' => $company->id, 'identifier' => $invoice_number, 'description' => 'INVOICING', 'source' => 'nonrefundable_invoices', 'flag' => 'DR', 'amount' =>$total_invoiced]);
                                }

                                if (!statement::whereidentifier($receiptnumber)->wheresource('receipts')->exists()) {
                                    statement::create(['company_id' => $company->id, 'identifier' => $receiptnumber, 'description' => 'RECEIPTING:' . $payment->mode, 'source' => 'receipts', 'flag' => 'CR', 'amount' => $payment->amount]);
                                }
                                $status = $this->invoicing->check_invoice_status($invoice_number);
                                 $code = "completed";
                                if ($status == 'APPROVED') {
                                    $message = 'Registration successfully completed please download your registration certificates';
                                } elseif ($status == 'PENDING') {
                                    $message = 'Registration successfully completed. Your company documents awaiting verification this may take 24 - 48 hours from day of  process completion. Please this excludes registrations done on weekends';
                                } else {
                                    $code ="incomplete";
                                    $message = 'Payment of ' . $payment->amount . ' was successfully receipt please clear balance to complete registration';
                                }
                               


                            } elseif (strtoupper($status->status()) == 'SENT' || strtoupper($status->status()) == 'CANCELLED') {
                                $payment->status = $status->status();
                                $payment->save();
                                $message = ' Your payment attempt was ' . $status->status();
                                $code = 'errorMessage';

                            } else {
                                $message='Failed to completed please retry';
                                }
                           Notification::send($users, new paymentNotification($message));
                            return array('status'=>$code,'message'=>$message);
                    }else{
                        return array('status' => 'errorMessage', 'data' => [], 'message' => 'Failed to completed please retry');
                    }


                    }catch (\Exception $exception){
                        return array('status'=>'errorMessage','data'=>[],'message'=>$exception->getMessage());
                    }


              
            }else{
                return array('status'=>'errorMessage','data'=>[],'message'=>'No online payment found');
            }

        }else{
            return array('status'=>'errorMessage','data'=>[],'message'=>'No pending invoice found');
        }



    }

    public function checkPending($company){

        $payments =  onlinepayments::wherecompany_id($company->id)->wherestatus('PENDING')->get();
        $message =[];
        if(count($payments)>0){
            foreach ($payments as $key => $payment) {
          
            $invoice = $this->invoicing->retrieveInvoice($payment->invoice_number);
            if(count($invoice)>0) {
                $users = User::wherecompany_id($company->id)->get();
                
                $code=[];
                $status='';
                $invoice_number = $invoice[0]->invoice_number;
                $total_invoiced = $invoice->sum('cost');
                $currency = !is_null($invoice[0]->currency) ? $invoice[0]->currency->name :  'ZWL'; 
               
                if(!is_null($payment)){
                    /** check if onlinepayment was receipt */
    
                    if(!receipts::where(['method'=>$payment->mode,'source_id'=>$payment->id])->exists()){
                        
                        $paynow = $this->HELPER->paynowMobile();
                         
                        if($currency=='USD')
                         {
                        $paynow = $this->HELPER->paynowOnline();
			  
                         }
                     
                        try {
                            
                            $status = $paynow->pollTransaction($payment->poll_url);
                             
                            if (!empty($status))
                            {
				
                                if (strtoupper($status->status()) == 'PAID' || strtoupper($status->status()) == 'AWAITING DELIVERY') {
                                    $payment->status = $status->status();
                                    $payment->save();
                                    $receiptnumber = $this->HELPER->get_receipt_number();
                                    receipts::firstOrCreate(
                                        ['source_id' => $payment->id, 'method' => $payment->mode],
                                        ['invoicenumber' => $payment->invoice_number,
                                            'receiptnumber' => $receiptnumber,
                                            'source_id' => $payment->id,
                                            'company_id' => $payment->company_id,
                                            'method' => $payment->mode,
                                            'currency' => $payment->invoice->currency->name,
                                            'amount' => $payment->amount,
                                            'user_id' => Auth::user()->id
                                        ]
                                    );
    
                                    $statement = statement::whereidentifier($invoice_number)->wheresource('nonrefundable_invoices')->first();
                                    if (!is_null($statement)) {
                                        if ($statement->amount != $total_invoiced) {
                                            $statement->amount = $total_invoiced;
                                            $statement->save();
                                        }
                                    } else {
                                        statement::create(['company_id' => $company->id, 'identifier' => $invoice_number, 'description' => 'INVOICING', 'source' => 'nonrefundable_invoices', 'flag' => 'DR', 'amount' => $total_invoiced]);
                                    }
    
                                    if (!statement::whereidentifier($receiptnumber)->wheresource('receipts')->exists()) {
                                        statement::create(['company_id' => $company->id, 'identifier' => $receiptnumber, 'description' => 'RECEIPTING:' . $payment->mode, 'source' => 'receipts', 'flag' => 'CR', 'amount' => $payment->amount]);
                                    }
                                    $status = $this->invoicing->check_invoice_status($invoice_number);
    
                                    if ($status == 'APPROVED') {
                                        $message[] = array('status'=>'successMessage', 'message'=>'Registration successfully completed please download your registration certificates');
                                    } elseif ($status == 'PENDING') {
                                        $message[] = array('status'=>'successMessage', 'message'=>'Registration successfully completed. Your company documents awaiting verification this may take 24 - 48 hours from day of  process completion. Please this excludes registrations done on weekends');
                                    } else {
                                        $message[] = array('status'=>'successMessage', 'message'=>'Payment of ' . $payment->amount . ' was successfully receipt please clear balance to complete registration');
                                    }
                                 
    
    
                                } elseif (strtoupper($status->status()) == 'SENT' || strtoupper($status->status()) == 'CANCELLED' || strtoupper($status->status()) == 'CREATED') {
                                     
                                    $payment->status = $status->status();
                                    $payment->save();
                                    return $payment;
                                    $message[] = array('status'=>'errorMessage', 'message'=>'Your payment attempt was ' . $status->status());
                                  
    
                                } else {
                                    $message[] = array('status'=>'errorMessage', 'message'=>'Failed to completed please retry');
                                    }
                            Notification::send($users, new paymentNotification($message));
                              
                        }else{
                            $message[] = array('status'=>'errorMessage', 'message'=>'Failed to completed please retry');
                        }
    
    
                        }catch (\Exception $exception){
                            
                            $message[] = array('status'=>'errorMessage', 'message'=>$payment->poll_url);
                        }
    
    
                    }else{
                        
                        $message[] = array('status'=>'errorMessage', 'message'=>'Payment already receipted');
                    }
                }else{
                   
                    $message[] = array('status'=>'errorMessage', 'message'=>'No online payment found');
                }
    
            }else{
                $message[] = array('status'=>'errorMessage', 'message'=>'No pending invoice found');
             }
                
                }
    
        }else{
            $message[]= array('status'=>'errorMessage', 'message'=>'No Pending Payments Found');
        }

        return $message;

    }

    public  function  pending($company){
      return onlinepayments::wherecompany_id($company->id)->wherestatus('PENDING')->get();
    }
}

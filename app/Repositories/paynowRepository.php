<?php

namespace App\Repositories;

use App\Interfaces\paynowInterface;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Helpers\generalHelper;
use App\Models\onlinepayments;
use App\Models\receipts;
use App\Models\statement;
use App\Models\User;
use App\Notifications\paymentNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Repositories\suspenseRepository;

class paynowRepository implements paynowInterface{

    private $HELPER ;
    private $invoicing;
    public function __construct(generalHelper $helper,supplier_invoicing_Interface $invoicing)
    {
        $this->HELPER = $helper;
        $this->invoicing = $invoicing;
    }
    public function initiate(){
     $paynow = $this->HELPER->paynowOnline();
     $user = Auth::user();
     $invoice = $this->invoicing->getInvoice($user->company);
     $amount = $invoice->sum('cost');
     if(count($invoice)>0){
         $invoice_number = $invoice[0]->invoice_number;
         $this->HELPER->check_invoice_settlement($invoice[0]->invoice_number,$user->email);
         $status = $this->HELPER->check_invoice_status($invoice[0]->invoice_number);
         if($status =='INCOMPLETE')
         {
         $email =$this->HELPER->getEmail();   
         $payment = $paynow->createPayment($invoice_number,$email);
         $payment->add($invoice_number,$amount);
         try {
             $response = $paynow->send($payment);
             if($response->success()){
                 $pollUrl = $response->pollUrl();
                 $link = $response->redirectUrl();
                 
                 $online= onlinepayments::create(['invoice_number'=>$invoice_number,
                     'company_id'=>$user->company->id,
                     'poll_url'=>$pollUrl,
                     'amount'=>$amount,
                     'mode'=>'PAYNOW',
                     'status'=>'PENDING'
                 ]);
                 return array('status'=>'success','data'=>$link,'message'=>'Payment successfully initiated');

             }
         }catch (Exception $e){
             return array('status'=>'error','data'=>[],'message'=>$e->getMessage());
         }
        }else{
            return array('status'=>'settled','data'=>[],'message'=>'Invoiced already settled'); 
        }

     }else{
         return array('status'=>'error','data'=>[],'message'=>'No pending invoice found');
     }
    }

    public function check(){
        $user = Auth::user();
        $payment = onlinepayments::wherecompany_id($user->company->id)->wherestatus('PENDING')->orderBy('id','desc')->first();
        $invoice = $this->invoicing->getInvoice($user->company);
        $messages=[];
        if(count($invoice)>0) {
            $users = User::wherecompany_id($invoice[0]->company_id)->get();
            $message ='';
            $code='';
            $invoice_number = $invoice[0]->invoice_number;
            $total_invoiced = $invoice->sum('cost');
            if(!is_null($payment)){
                /** check if onlinepayment was receipt */

                if(!receipts::where(['method'=>$payment->mode,'source_id'=>$payment->id])->exists()){
                    $paynow = $this->HELPER->paynowMobile();
                    if(strtoupper($payment->mode)=='PAYNOW')
                     {
                    $paynow = $this->HELPER->paynowOnline();
                     };
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
                                    statement::create(['company_id' => $user->company->id, 'identifier' => $invoice_number, 'description' => 'INVOICING', 'source' => 'nonrefundable_invoices', 'flag' => 'DR', 'amount' => $total_invoiced]);
                                }

                                if (!statement::whereidentifier($receiptnumber)->wheresource('receipts')->exists()) {
                                    statement::create(['company_id' => $user->company->id, 'identifier' => $receiptnumber, 'description' => 'RECEIPTING:' . $payment->mode, 'source' => 'receipts', 'flag' => 'CR', 'amount' => $payment->amount]);
                                }
                                $regstatus = $this->invoicing->check_invoice_status($invoice_number);

                                if ($regstatus == 'APPROVED') {
                                    $message = 'Registration successfully completed please download your registration certificates';
                                    $code ='COMPLETED';
                                } elseif ($regstatus == 'PENDING') {
                                    $message = 'Registration successfully completed. Your company documents awaiting verification this may take 24 - 48 hours from day of  process completion. Please this excludes registrations done on weekends';
                                    $code ='COMPLETED';
                                } else {
                                    $message = 'Payment of ' . $payment->amount . ' was successfully receipt please clear balance to complete registration';
                                    $code ='INCOMPLETED';
                                }
                                


                            } elseif (strtoupper($status->status()) == 'SENT' || strtoupper($status->status()) == 'CANCELLED'|| strtoupper($status->status()) == 'CREATED') {
                                $payment->status = $status->status();
                                $payment->save();
                                $message = ' Your payment attempt was ' . $status->status();
                                $code = 'error';

                            } else {
                                $message='Failed to complete payment please retry';
                                }
                              $user->notify(new paymentNotification($message));                        
                            return array('status'=>$code,'message'=>$message);
                    }else{
                        return array('status' => 'error', 'data' => [], 'message' => 'Failed to completed please retry');
                    }


                    }catch (\Exception $exception){
                        return array('status'=>'error','data'=>[],'message'=>$exception->getMessage());
                    }


                }else{
                    return array('status'=>'error','data'=>[],'message'=>'Payment already receipted');
                }
            }else{
                return array('status'=>'error','data'=>[],'message'=>'No online payment found');
            }

        }else{
            return array('status'=>'error','data'=>[],'message'=>'No pending invoice found');
        }

    }

    public function  check_by_id($id,$company){
        $payment = onlinepayments::whereid($id)->first();
        $suspense = new suspenseRepository();
        $invoice = $this->invoicing->retrieveInvoice($payment->invoice_number);
        if(count($invoice)>0) {
            $users = User::wherecompany_id($invoice[0]->company_id)->get();
            $message ='';
            $code='';
            $invoice_number = $invoice[0]->invoice_number;
            $total_invoiced = $invoice->sum('cost');
            $total_receipted = count($invoice[0]->receipts)>0 ? $invoice[0]->receipts->sum('amount') : 0;
            $due = $total_invoiced - $total_receipted;
            if(!is_null($payment)){
                /** check if onlinepayment was receipt */

                if(!receipts::where(['method'=>$payment->mode,'source_id'=>$payment->id])->exists()){

                  
                    $paynow = $this->HELPER->paynowMobile();
                    if(strtoupper($payment->mode)=='PAYNOW')
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

                                /**
                                 * if due variable has a zero value it means invoice has been settled hence the client  has made an over payment this amount has to be credited to his internal wallet
                                 */
                                if($due==0)
                                {
                                    $accountnumber = $this->HELPER->getAccountNumber($payment->company,$payment->invoice->currency->name,'NONREFUNDABLE');
                                    $args = array("banktransaction_id"=>$payment->id,'source'=>$payment->mode,'company_id'=>$payment->company_id,'accountnumber'=>$accountnumber[0]['accountnumber'],'currency'=>$payment->invoice->currency->name,'amount'=>$payment->amount);
                                    $suspense->captureMobile($args);
                                    return array('status'=>'successMessage','message'=>'Invoice has already been settled. Your amount has been Credited to you internal Wallet');
                                }else{

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
                                    $message = 'Registration successfully completed please download your registration certificates';
                                } elseif ($status == 'PENDING') {
                                    $message = 'Registration successfully completed. Your company documents awaiting verification this may take 24 - 48 hours from day of  process completion. Please this excludes registrations done on weekends';
                                } else {
                                    $message = 'Payment of ' . $payment->amount . ' was successfully receipt please clear balance to complete registration';
                                }
                                $code ='successMessage';
                            }


                            } elseif (strtoupper($status->status()) == 'SENT' || strtoupper($status->status()) == 'CANCELLED' || strtoupper($status->status()) == 'CREATED') {
                                $payment->status = $status->status();
                                $payment->save();
                                $message = ' Your payment attempt was ' . $status->status();
                                $code = 'errorMessage';

                            } else {
                                $message='Failed to complete payment please retry';
                                }
                                
                                $users = User::wherecompany_id($company->id)->get();
                                Notification::send($users, new paymentNotification($message));
                            return array('status'=>$code,'message'=>$message);
                    }else{
                        return array('status' => 'errorMessage', 'data' => [], 'message' => 'Failed to completed please retry');
                    }


                    }catch (\Exception $exception){
                        return array('status'=>'errorMessage','data'=>[],'message'=>$exception->getMessage());
                    }


                }else{
                    return array('status'=>'errorMessage','data'=>[],'message'=>'Payment already receipted');
                }
            }else{
                return array('status'=>'errorMessage','data'=>[],'message'=>'No online payment found');
            }

        }else{
            return array('status'=>'errorMessage','data'=>[],'message'=>'No pending invoice found');
        } 
    }

    public function getList($company)
    {
        return  onlinepayments::wherecompany_id($company->id)->get();
    }

}
<?php

namespace App\Repositories;

use App\Events\processDeposit;
use App\Interfaces\banktransactionsInterface;
use App\Listeners\processInvoice;
use App\Models\banks;
use App\Models\banktransactions;
use App\Models\company;
use App\Models\statement;
use Illuminate\Http\Request;
use Symfony\Contracts\EventDispatcher\Event;
use App\Repositories\suspenseRepository;
use Illuminate\Support\Facades\Log;
class banktransactionsRepository implements banktransactionsInterface{

    private $suspense;

    public function __construct(suspenseRepository $suspense)
    {
        $this->suspense = $suspense;
    }
    public function receive(Request $request)
    { 
        $bank = banks::whereauthcode($request->authcode)->first();         
        if(!is_null($bank))
        {
         
            if(!banktransactions::wherereferencenumber($request->referencenumber)->exists())
            {
                   $customer = $this->check_description($request->description);
                    $customer_number="";
                    $status="PENDING";
                  if(!is_null($customer)){
                       $customer_number = $customer->regnumber;
                       $status ="CLAIMED";                   
                   }

              
              
                $transaction =  banktransactions::create(['bank_id'=>$bank->id,
                                            'trans_date'=>$request->trans_date,
                                            'referencenumber'=>$request->referencenumber,
                                            'source_reference'=>$request->source_reference,
                                            'statement_reference'=>!is_null($request->praz_customer_name) ? $request->praz_customer_name : '', 
                                            'customer_number'=>$customer_number,
                                            'description'=>$request->description,
                                            'amount'=>$request->amount,
                                            'status'=>$status,
                                            'accountnumber'=>$request->accountnumber,
                                            'currency'=>$request->currency
                                        ]);

                                        if(!is_null($customer)){
                                             $args = array("banktransaction_id"=>$transaction->id,'company_id'=>$customer->id,'accountnumber'=>$transaction->accountnumber,'currency'=>$transaction->currency,'amount'=>$transaction->amount);
                                             $this->suspense->captureRecord($args);
                                        }
              
                return ['status'=>'success','description'=>'Reference number saved','code'=>200];
            }
            else
            {
                return['status'=>'error','description'=>'Reference Already Exists','code'=>200];
            }
           
        }
        else{
            return ['status'=>'error','description'=>'UNAUTHORIZED','code'=>200];
        }  
    }


    public function claim($referencenumber,$company){
        $transaction = banktransactions::wheresource_reference($referencenumber)->orWhere('referencenumber','=',$referencenumber)->first();
       
        if(!is_null($transaction)){
            if($transaction->status=='PENDING'){
                $type = $this->getType($transaction->accountnumber);
                $transaction->status='CLAIMED';
                $transaction->customer_number = $company->regnumber;
                $transaction->save();
                 $args = array("banktransaction_id"=>$transaction->id,'company_id'=>$company->id,'accountnumber'=>$transaction->accountnumber,'currency'=>$transaction->currency,'amount'=>$transaction->amount);
                  $this->suspense->captureRecord($args);
                $message ="";

                if($type=='NONREFUNDABLE')
                {
                    $message="Reference  number successfully claim, Please this amount can only be used for supplier registration,establishment ,contract and spoc fees payments";
                }else{
                    $message="Reference  number successfully claim, Please this amount can only be used for BID BOND SECURITY payments";
              
                }
                return ['status'=>'successMessage','message'=>$message,'code'=>'SUCCESS'];


            }else{
                return ['status'=>'errorMessage','message'=>'Reference number already utilized.PLease upload  your proof of payment. PLEASE NOTE THIS MAY TAKE TIME BECAUSE WE WILL BE MANUALLY VERIFING IF THE TRANSACTION BELOWS TO YOU','code'=>'CLAIMED'] ;
     
            }

        }else{
            return ['status'=>'errorMessage','message'=>'WE could not find a transaction with the reference number you entered, upload  your proof of payment. PLEASE NOTE THIS MAY TAKE TIME BECAUSE WE WILL  HAVE TO MANUALLY SEARCHING FOR YOUR PAYMENT','code'=>'NOTFOUND'] ;
        }
    }

    public function getList($company)
    {
        return banktransactions::wherecustomer_number($company->regnumber)->get();
    }

    function check_description($description){
        $db_name = preg_replace('/\s+/', '', $description);
         $customer = company::with('users')->whereregnumber($db_name)->first();        
          return $customer;
     }

     function getType($accountnumber){
         if($accountnumber=='10721064850020'){
             return 'NONREFUNDABLE';
         }elseif ($accountnumber=='10721064850030') {
            return 'REFUNDABLE';
         }
         elseif ($accountnumber=='10721064850040') {
            return 'REFUNDABLE';
         }elseif ($accountnumber=='10721064850080') {
            return 'REFUNDABLE';
         }
     }

}
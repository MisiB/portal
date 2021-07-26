<?php
namespace App\Repositories\administrator;

use App\Helpers\generalHelper;
use App\Models\banktransactions;
use App\Models\company;
use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use App\Models\receipts;
use App\Models\rtgs;
use App\Models\suspense;
use App\Models\suspense_receipts;
use App\Models\tender_invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class tenderReceiptingRepository{
   
    public function getProfile($id){
        return company::with('administrationfees.entity','bidbonds.entity','invoices')->whereid($id)->first();
    }

    public function add(Request $request)
    {
       /*  $helper = new generalHelper();
        $transaction = banktransactions::whereid($request->transaction_id)->wherestatus('PENDING')->first();
        $invoice = tender_invoice::whereid($request->invoice)->first(); 
        $accoutnumber = $helper->getAccount($invoice->type,$invoice->currency->name);
        if(!is_null($transaction)){
           $suspense=  suspense::where(['banktransaction_id'=>$transaction->id])->first();
   ;
           if(is_null($suspense))
           {
               suspense::create(['banktransaction_id'=>$transaction->id,'company_id'=>$invoice->company_id,'currency'=>$invoice->currency->name,'accountnumber'=>$accoutnumber,'amount'=>$transaction->amount]);
               $transaction->customer_number = $invoice->company->regnumber;
               $transaction->status = 'CLAIMED';
               $transaction->save();
           }
        }
           $balance_invoice = $invoice->amount - $invoice->receipts()->where('type',$request->type)->sum('amount');
             
           $suspense = suspense::with('suspenseReceipts')->where(['company_id'=>$invoice->company_id,'accountnumber'=>$accoutnumber,'status'=>'PENDING'])->first();
           Log::info($suspense);
            $suspensereceipted = count($suspense->suspenseReceipts)>0 ? $suspense->suspenseReceipts->sum('amount') : 0;
           $balance = $suspense->amount - $suspensereceipted;
            Log::info($balance);
            $due = $balance_invoice > $balance ? $balance  : $balance_invoice;
             $uuid = Str::uuid();
             $receiptnumber = $helper->get_receipt_number();
             $suspense_receipt= suspense_receipts::create(['suspense_id'=>$suspense->id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$suspense->currency,'amount'=>$due]);
             receipts::firstOrCreate(
                ['source_id' => $suspense_receipt->id, 'method' =>'suspense'],
                ['invoicenumber' =>$invoice->invoice_number,
                    'receiptnumber' =>$receiptnumber,
                    'source_id' =>$suspense_receipt->id,
                    'company_id' =>$invoice->company_id,
                    'type'=>$invoice->type,
                    'description'=>$invoice->description,
                    'method' =>'suspense',
                    'currency' =>$invoice->currency->name,
                    'amount' =>$due,
                    'user_id' =>Auth::guard('admin')->user()->id
                ]
            );
            if($balance_invoice >= $balance){
                $suspense->status ='UTILIZED';
                $suspense->save();
            }
            if($balance_invoice == $due)
            {
                 $invoice->status = 'PAID';
                 $invoice->save();
                 $code = $helper->helper_generate_tender_code($invoice->company_id,$invoice->type);
                if($invoice->type =='REFUNDABLE'){
                    $bid = mybidbonds::wheretendernumber($invoice->tendernumber)->wherecompany_id($invoice->company_id)->first();
                   
                    $bid->code = $code;
                    $bid->paymentstatus ='PAID';
                    $bid->save();
                }else{
                   $fee =  myadministrationfees::where(['company_id'=>$invoice->company_id,'tendernumber'=>$invoice->tendernumber,'description'=>$invoice->description])->first();
                   $fee->code = $code;
                   $fee->paymentstatus = 'PAID';
                   $fee->save();
                }
            }


               return array('status'=>'successMessage','message'=>'Transactions successfully completed'); */

               $invoice = tender_invoice::whereid($request->id)->first();
                if(!is_null($invoice))
                {
                $path =  $request->file('filename')->store('proof','my_files');
                 rtgs::create(['company_id'=>$invoice->company_id,'invoice_number'=>$invoice->invoice_number,'type'=>$invoice->type,'filename'=>$path,'currency_id'=>$invoice->currency_id,'name'=>$request->name,'paymentdate'=>$request->paymentdate]) ;
                $invoice->status ='AWAITING';
                $invoice->save();
                 return array('status'=>'successMessage','message'=>'Proof of payment successfully upload please go to RTGS module to approve uploaded proof of payment'); 
                }else{
                    return array('status'=>'errorMessage','message'=>'Invoice not found');
                }


       
    }
}
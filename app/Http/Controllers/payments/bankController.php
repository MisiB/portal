<?php

namespace App\Http\Controllers\payments;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\popuploadRequest;
use App\Http\Requests\referencenumberRequest;
use App\Interfaces\bankpaymentsInterface;
use App\Interfaces\banktransactionsInterface;
use App\Interfaces\statementInterface;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Interfaces\suspenseInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class bankController extends Controller
{
    private $statement;
    private $invoice;
    private $HELPER;
    private $suspense;
    private $bankpayment;
    private $transaction;
    public function __construct(statementInterface $statement,supplier_invoicing_Interface $invoice,generalHelper $HELPER,suspenseInterface $suspense,bankpaymentsInterface $bankpayment,banktransactionsInterface $transaction)
    {
      $this->statement = $statement;
      $this->invoice = $invoice;  
      $this->HELPER = $HELPER;
      $this->suspense = $suspense;
      $this->bankpayment = $bankpayment;
      $this->transaction = $transaction;

    }
     public function index(){
         $company = $this->HELPER->get_company_name();
         $invoice = $this->invoice->getInvoice($company);

         if(count($invoice)>0)
         {
          $this->HELPER->check_invoice_settlement($invoice[0]->invoice_number,Auth::user()->email);
          $status = $this->HELPER->check_invoice_status($invoice[0]->invoice_number);
          if($status =='INCOMPLETE')
          {
                   $currency = $invoice[0]->currency->name;
                   $accountnumber = $this->HELPER->getAccountNumber($company,$currency,'NONREFUNDABLE');
                
                    $balance =0;
                    if(count($accountnumber)>0)
                      {
                        for ($i=0; $i < count($accountnumber); $i++) { 
                          $balance = $balance+$this->suspense->getBalance($company,$accountnumber[$i]['accountnumber']);
                        }
                     
                      }
                    $totalinvoiced = $invoice->sum('cost');
                    $totalpaid = $invoice[0]->receipts->sum('amount');
                    $due = $totalinvoiced - $totalpaid;
                     return Inertia::render('Accounts/users/payments/internal',compact('due','balance','currency'));
          }else{
            return redirect()->route('dashboard')->with('successMessage','Registration successfully completed');
          }
         }else{
             return redirect()->back()->with('errorMessage','No Pending Invoices Found');
         }
      }

      public function update(){
        $company = $this->HELPER->get_company_name();
        $confirm = $this->bankpayment->process($company);
        return  redirect()->route('payment')->with($confirm['status'],$confirm['message']);
      }

      public function store(referencenumberRequest $request){
          $company = $this->HELPER->get_company_name();
        $response = $this->transaction->claim($request->referencenumber,$company);

         if($response['code']=='SUCCESS')
         {
           return redirect()->route('payment')->with('successMessage',$response['message']);
         }
         else{

          return redirect()->route('rtgs.index')->with('errorMessage',$response['message']);
         }
      }

     

      
}

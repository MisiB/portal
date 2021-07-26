<?php

namespace App\Http\Controllers;

use App\Helpers\generalHelper;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Interfaces\suspenseInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Repositories\bankpaymentsRepository;

class paymentController extends Controller
{
    private $invoice;
    private  $HELPER;
    private $suspense;
    private $bankrepository;

    public function  __construct(bankpaymentsRepository $bankrepository,supplier_invoicing_Interface $invoice,generalHelper $helper,suspenseInterface $suspense){
        $this->invoice = $invoice;
        $this->HELPER = $helper;
        $this->suspense = $suspense;
        $this->bankrepository = $bankrepository;
    }
     public  function  index(){
        $company = $this->HELPER->get_company_name();
         $invoices = $this->invoice->getInvoice($company);
         if(count($invoices)>0) {
             $total = count($invoices) > 0 ? $invoices->sum('cost') : 0;
             $receipts = $invoices[0]->receipts;
             $currency = $invoices[0]->currency->name;
             $receipted = count($receipts) > 0 ? $receipts->sum('amount') : 0;
             $balance = $total - $receipted;
             $accountnumber = $this->HELPER->getAccountNumber($company,$currency,'NONREFUNDABLE');
          
              $wallet =0;
              if(count($accountnumber)>0)
                {
                  for ($i=0; $i < count($accountnumber); $i++) { 
                    $wallet = $wallet+$this->suspense->getBalance($company,$accountnumber[$i]['accountnumber']);
                  }
               
                }
             if ($balance > 0) {
                 return Inertia::render('Accounts/users/registration/payment', ['totalinvoiced' => $total, 'totalreceipted' => $receipted,'currency'=>$currency, 'invoice' => $invoices,'balance'=>$balance,'wallet'=>$wallet]);
             } else {
                  return redirect()->route('dashboard');
             }
         }else{
             return redirect()->route('dashboard');
         }
     }


     public function show($id){
      $company = $this->HELPER->get_company_name();

      $response = $this->bankrepository->processMobile($company);

      if($response['status']=='successMessage'){
        return redirect()->route('dashboard')->with($response['status'],$response['message']);
      }elseif($response['status']=='incomplete'){
        return redirect()->route('payment')->with('successMessage',$response['message']);
      }else{
        return redirect()->back()->with('errorMessage',$response['message']);
      }

     }

}

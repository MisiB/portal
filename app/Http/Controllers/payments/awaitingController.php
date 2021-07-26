<?php

namespace App\Http\Controllers\payments;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\rtgsInterface;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class awaitingController extends Controller
{
     private $rtgs;
     private $HELPER;
     private $invoicing;
     public function __construct(rtgsInterface $rtgs,generalHelper $HELPER,supplier_invoicing_Interface $invoicing)
     {
        $this->rtgs = $rtgs;
        $this->HELPER = $HELPER;
        $this->invoicing = $invoicing;
     }

     public function index(){
        $company = Auth::user()->company;
        $awaitingInvoice = $this->invoicing->getInvoices($company,['AWAITING']);
        $invoices=[];
      

         if(count($awaitingInvoice)>0){
            $grouped =  $awaitingInvoice->groupBy('invoice_number');
             foreach ($grouped as $key => $value) {
                  $total  = $value->sum('cost');
                  $receipted = $value[0]->receipts->sum('amount');
                  $balance = $total-$receipted;
                  $rtgs = $value[0]->rtgs;
                  $invoices[] = array('invoicenumber'=>$key,'total'=>$total,'paid'=>$receipted,'balance'=>$balance,'currency'=>$value[0]->currency->name,'rtgs'=>$rtgs,'transfers'=>$value[0]->transfers);
                   
                
              
             }
         }
        return Inertia::render('Accounts/users/payments/awaiting',['invoices'=>$invoices]);
     }

     public function show($id){
          $company = $this->HELPER->get_company_name();
          $response = $this->rtgs->verify($company,$id);
          return redirect()->back()->with($response['status'],$response['message']);
     }

     public function update(Request $request,$id){
      $company = $this->HELPER->get_company_name();
      $response = $this->rtgs->update($request,$id,$company);
      return redirect()->back()->with($response['status'],$response['message']);  
     }
}

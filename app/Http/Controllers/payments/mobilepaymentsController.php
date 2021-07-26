<?php

namespace App\Http\Controllers\payments;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\mobilepaymentsRequest;
use App\Interfaces\mobilepaymentsInterface;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class mobilepaymentsController extends Controller
{
    private  $mobile;
    private $invoicing;
    private  $HELPER;

    public  function __construct(mobilepaymentsInterface $mobile,supplier_invoicing_Interface $invoicing,generalHelper $helper){
     $this->mobile = $mobile;
     $this->invoicing=$invoicing;
     $this->HELPER = $helper;
    }

    public function  index(){
        return Inertia::render('Accounts/users/payments/confirm');
    }

    public  function show($id){
     $mode = $id;
     $company = $this->HELPER->get_company_name();
     $online = $this->mobile->pending($company);
     if(count($online)==0)
     {
         $invoice = $this->invoicing->getInvoice($company);
         $totalinvoiced = $invoice->sum('cost');
         $totalpaid = $invoice[0]->receipts->sum('amount');
         $balance = $totalinvoiced - $totalpaid;
         if ($mode == 'ECOCASH' || $mode == 'ONEMONEY') {
             return Inertia::render('Accounts/users/payments/mobile', ['mode' => $mode, 'balance' => $balance]);
         } else {
             return redirect()->route('payment')->with('errorMessage', 'Invalid Mode');
         }
     }else{
         return  redirect()->route('Pendingpayments.index');
     }

    }

    public  function  create(){
        return Inertia::render('Accounts/users/payments/confirm');
    }
    public function store(mobilepaymentsRequest $request){
        $company = $this->HELPER->get_company_name();
    
     $online = $this->mobile->intitate($request,$company);
         if($online['status']=='settled'){
            return redirect()->route('dashboard')->with('successMessage','Registration Successfully Completed');
         }elseif($online['status']=='success'){
        return Inertia::render('Accounts/users/payments/confirm',['online'=>$online]);
         }else{
             return redirect()->back()->with('errorMessage',$online['message']);
         }
    }
    public  function edit($id){
        $company = $this->HELPER->get_company_name();
        $confirm = $this->mobile->confirm($id,$company);
        $response ="";
        if($confirm['status']=='incomplete'){
           
            return  redirect()->route('payment')->with('successMessage',$confirm['message']);
        }
        elseif($confirm['status']=='errorMessage'){
            return  redirect()->route('payment')->with('errorMessage',$confirm['message']);
        }else{
            return  redirect()->route('dashboard')->with('successMessage',$confirm['message']);  
        }
        

    }
}

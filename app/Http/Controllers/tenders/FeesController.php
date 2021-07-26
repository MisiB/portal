<?php

namespace App\Http\Controllers\tenders;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\adminFeeRequest;
use App\Interfaces\mytenderfeesInterface;
use App\Interfaces\tenderfeePaymentInterface;
use App\Models\myadministrationfees;
use App\Repositories\administrator\entityRepository;
use App\Repositories\users\mytenderFeesRepository;
use App\Repositories\users\mytendersRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PDF;

class FeesController extends Controller
{
     private $HELPER;
     private $mytenderfees;
     private $payment;
     private $entitylist;
     private $mytenders;
     private $myfees;
     public function __construct(generalHelper $HELPER,mytenderfeesInterface $mytenderfees,tenderfeePaymentInterface $payment,entityRepository $entitylist,mytendersRepository $mytenders,mytenderFeesRepository $myfees)
     {
        $this->HELPER = $HELPER;
        $this->mytenderfees = $mytenderfees;
        $this->payment = $payment;
        $this->entitylist = $entitylist;
        $this->mytenders = $mytenders;
        $this->myfees = $myfees;

     }
    
     public function index(){
        $company = $this->HELPER->get_company_name();
        $invoices = $this->payment->getInvoices($company);      
         return Inertia::render('Accounts/users/tenders/fees/index',compact('invoices'));
         
     }
    
     public function create(){
      $entitylist = $this->entitylist->getEntities();
      $currencylist = $this->HELPER->getCurrency();
      return Inertia::render('Accounts/users/tenders/fees/manualrequest',compact('currencylist','entitylist'));
     }
     public function show($id){
      $company = $this->HELPER->get_company_name();
      return $this->myfees->download($id,$company);
     }

     public function edit($id){
      $company = $this->HELPER->get_company_name();
      $awaiting = $this->payment->getAwaiting($company);
      return Inertia::render('Accounts/users/tenders/fees/awaiting',compact('awaiting'));
   
     }

     public function store(Request $request){
         $request->validate(['tendernumber'=>'required','entity'=>'required','feetype'=>'required','closedate'=>'required','currency'=>'required','amount'=>'required | numeric','period'=>'required_if:feetype,BIDBOND','files'=>'required | array']);
         $response = $this->myfees->addManual($request);          
         return redirect()->route('TenderFees.index')->with($response['status'],$response['message']);
     }

     public function destroy($id){
        $company = $this->HELPER->get_company_name(); 
        $response = $this->myfees->delete($id,$company);          
        return redirect()->route('TenderFees.index')->with($response['status'],$response['message']);
          
     }
}

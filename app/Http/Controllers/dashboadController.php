<?php

namespace App\Http\Controllers;

use App\Helpers\generalHelper;
use App\Interfaces\mobilepaymentsInterface;
use App\Interfaces\suppliers\registrationsInterface;
use App\Interfaces\suppliers\supplier_dashboard_interface;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Interfaces\suspenseInterface;
use App\Repositories\categoryRepositoy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\contacts;
use Inertia\Inertia;

class dashboadController extends Controller
{
    private $dashboard;
    private $mobile;
    private $registrations;
    private $category;
    private $invoicing;
    private $HELPER;
    private $suspense;


    public function __construct(supplier_dashboard_interface $dashboard,suspenseInterface $suspense,mobilepaymentsInterface $mobile,registrationsInterface $registrations,categoryRepositoy $category,supplier_invoicing_Interface $invoicing,generalHelper $HELPER){
         $this->dashboard = $dashboard;
         $this->mobile = $mobile;
         $this->registrations = $registrations;
         $this->category = $category;
         $this->invoicing = $invoicing;
         $this->HELPER = $HELPER;
         $this->suspense = $suspense;
    }
      public  function index(){

        if(Auth::user()->type=='ENTITY'){
          return redirect()->route('entity.home');
        }
         $company = Auth::user()->company;
         
         $contacts = contacts::wherecompany_id($company->id)->get();
      
         if(count($contacts)>0)
         {
         $registrations = $this->registrations->getByCompany($company->id);
         $categorylist = $this->category->getList('CREATED');
         $usd_nonrefundable_accountnumber = $this->HELPER->getAccountNumber($company,'USD','NONREFUNDABLE');
         $usd_refundable_accountnumber = $this->HELPER->getAccountNumber($company,'USD','REFUNDABLE');
         $zwl_nonrefundable_accountnumber = $this->HELPER->getAccountNumber($company,'ZWL','NONREFUNDABLE');
         $zwl_refundable_accountnumber = $this->HELPER->getAccountNumber($company,'ZWL','REFUNDABLE');


         $usd_nonrefundable_balance =0;
         $usd_refundable_balance =0;
         $zwl_nonrefundable_balance =0;
         $zwl_refundable_balance =0;
         if(count($usd_nonrefundable_accountnumber)>0)
           {
             for ($i=0; $i < count($usd_nonrefundable_accountnumber); $i++) { 
              $usd_nonrefundable_balance = $usd_nonrefundable_balance+$this->suspense->getBalance($company,$usd_nonrefundable_accountnumber[$i]['accountnumber']);
             }
          
           }
           if(count($usd_refundable_accountnumber)>0)
           {
             for ($i=0; $i < count($usd_refundable_accountnumber); $i++) { 
              $usd_refundable_balance = $usd_refundable_balance+$this->suspense->getBalance($company,$usd_refundable_accountnumber[$i]['accountnumber']);
             }
          
           }

           if(count($zwl_nonrefundable_accountnumber)>0)
           {
             for ($i=0; $i < count($zwl_nonrefundable_accountnumber); $i++) { 
              $zwl_nonrefundable_balance = $zwl_nonrefundable_balance+$this->suspense->getBalance($company,$zwl_nonrefundable_accountnumber[$i]['accountnumber']);
             }
          
           }
           if(count($zwl_refundable_accountnumber)>0)
           {
             for ($i=0; $i < count($zwl_refundable_accountnumber); $i++) { 
              $zwl_refundable_balance = $zwl_refundable_balance+$this->suspense->getBalance($company,$zwl_refundable_accountnumber[$i]['accountnumber']);
             }
          
           }

         $invoicing = $this->invoicing->getInvoices($company,['PENDING','AWAITING']);
         $pending = $this->mobile->pending($company);
         $pendingInvoice =count($invoicing)>0 ? $invoicing->where('status','PENDING') : [];
         $awaitingInvoice = count($invoicing)>0 ? $invoicing->where('status','AWAITING'):[];
         $awaiting = count($awaitingInvoice) > 0 ? array('invoicenumber'=>$awaitingInvoice[0]->invoice_number,'cost'=>$awaitingInvoice->sum('cost'),'receipted'=>count($awaitingInvoice[0]->receipts)>0 ? $awaitingInvoice[0]->receipts->sum('amount') : 0 ) : [];
          $currency = count($awaitingInvoice) > 0 ? $awaitingInvoice[0]->currency->name :'';
         $data = compact('company','registrations','categorylist','awaiting','usd_nonrefundable_balance','usd_refundable_balance','zwl_nonrefundable_balance','zwl_refundable_balance','currency');
         if(count($pending)==0)
         {
           
             if(count($invoicing)>0){
            
               if(count($pendingInvoice)>0){
               return  redirect()->route('Invoicing.index')->with('errorMessage','Please settle incomplete invoice');
               }else{
                return Inertia::render('Accounts/users/dashboard',['data'=>$data]);
               }
             }else{
             return Inertia::render('Accounts/users/dashboard',['data'=>$data]);
             }
         }else{
             return  redirect()->route('Pendingpayments.index')->with('errorMessage','Please Please complete your pending invoices');
         }
        }else{
          return  redirect()->route('profile.companyindex')->with('errorMessage','Please update your company profile to access your  dashboard');
    
        }

      }

     
}

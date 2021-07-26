<?php
namespace App\Repositories\administrator;

use App\Models\nonrefundable_invoices;
use App\Helpers\generalHelper;
use App\Repositories\suspenseRepository;

class awaitingSupplierInvoicesRepository{

 private $HELPER;
  private $suspense; 


  public function __construct(generalHelper $HELPER,suspenseRepository $suspense){
    $this->HELPER = $HELPER;
    $this->suspense = $suspense;
  }

    public function getList(){
        $invoices = nonrefundable_invoices::with('company','rtgs','company','receipts','currency')->wherestatus('AWAITING')->orderBy('created_at','DESC')->get();
        $grouped = $invoices->groupBy('company_id');
        $array = [];
        if(count($grouped)>0){
 
        foreach ($grouped as $key => $value) {
            $company = !is_null($value[0]->company) ? $value[0]->company->name : 'null';
            $balance  = $value->sum('cost') - $value[0]->receipts->sum('amount');
            $date =  !is_null($value[0]->created_at) ? $value[0]->created_at->diffForHumans() : 'null';
          $array[] = array("date"=>$date,"year"=>$value[0]->year,"invoice_number"=>$value[0]->invoice_number,"company"=>$company,'total_invoiced'=>$value->sum('cost'),'total_receipted'=>$value[0]->receipts->sum('amount'),'currency'=>$value[0]->currency->name,'balance'=>$balance,'data'=>$value);
        }
        }

        return $array;
    }

    public function getInvoice($inv){
        $invoices = nonrefundable_invoices::with('company','rtgs','category','company','receipts','currency')->wherestatus('AWAITING')->whereinvoice_number($inv)->get();
        $totalinvoiced = $invoices->sum('cost');
        $receipted = count($invoices[0]->receipts) > 0 ? $invoices[0]->receipts->sum('amount') : 0;
        $balance =   $totalinvoiced - $receipted;
        $company = $invoices[0]->company;
        $accountnumbers = $this->HELPER->get_account_numbers($invoices[0]->currency->name,'NONREFUNDABLE');
     
         $wallet =0;
         if(count($accountnumbers)>0)
           {
           foreach ($accountnumbers as $key => $value)
             { 
               $wallet = $wallet+$this->suspense->getBalance($company,$value->accountnumber);
             }
          
           } 
           $balance = $totalinvoiced - $receipted;
           return array('total'=>$totalinvoiced,'receipted'=>$receipted,'balance'=>$balance,'invoices'=>$invoices,'wallet'=>$wallet);
      
    }
}
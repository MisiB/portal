<?php
namespace App\Repositories\administrator;

use App\Models\tender_invoice;
use App\Helpers\generalHelper;
use App\Repositories\suspenseRepository;

class awaitingTenderInvoicesRepository{
  private $HELPER;
  private $suspense; 


  public function __construct(generalHelper $HELPER,suspenseRepository $suspense){
    $this->HELPER = $HELPER;
    $this->suspense = $suspense;
  }
    public function getList(){
        $invoices = tender_invoice::with('currency','rtgs','receipts','entity')->where(['status'=>'AWAITING'])->orderBy('created_at','DESC')->get();
        
        $grouped = $invoices->groupBy('company_id');
        $array = [];
        if(count($grouped)>0){

        foreach ($grouped as $key => $value) {
            $company = !is_null($value[0]->company) ? $value[0]->company->name : 'null';
            
            $receipted = count($value[0]->receipts)>0 ? (int)$value[0]->receipts->sum('amount') :0;
            
            $invoiced = $value->sum('amount');
          
            $balance = $invoiced - $receipted;
                     $array[] = array("date"=>$value[0]->created_at->diffForHumans(),'company_id'=>$value[0]->company_id,'year'=>$value[0]->year,"company"=>$company,'tendernumber'=>$value[0]->tender_number,'total_invoiced'=>$invoiced,'total_receipted'=>$receipted,'currency'=>$value[0]->currency->name,'balance'=>$balance,'data'=>$value);
        }
        }

        return $array;
    }

    public function getItem($id){
        $invoice = tender_invoice::with('currency','rtgs','receipts')->whereid($id)->wherestatus('AWAITING')->first();
        $total =  $invoice->amount;
        $receipts = $invoice->receipts;
        $currency = $invoice->currency->name;
        $receipted = count($receipts) > 0 ? $receipts->sum('amount') : 0;
        $balance = $total - $receipted;
        $company = $invoice->company;
        $accountnumbers = $this->HELPER->get_account_numbers($currency,$invoice->type);
     
         $wallet =0;
           foreach ($accountnumbers as $key => $value) {
              $wallet = $wallet+$this->suspense->getBalance($company,$value->accountnumber);
            }
         
           
           return array('total'=>$total,'receipted'=>$receipted,'invoice'=>$invoice,'wallet'=>$wallet);
    }
}
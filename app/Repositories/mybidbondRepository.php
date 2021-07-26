<?php 
namespace App\Repositories;

use App\Helpers\generalHelper;
use App\Interfaces\mybidbondInterface;
use App\Http\Requests\bidbondRequest;
use App\Models\bidbondfee;
use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use App\Models\tender_invoice;
use Carbon\Carbon;
use Illuminate\Support\Str;

class mybidbondRepository implements mybidbondInterface{
    public function getList($company)
    {
        
    }

    public function capture(bidbondRequest $request,$company)
    {
        $fee  = $this->getEstablishmentFee($request,$company);
        $helper = new generalHelper();
        $invoicenumber = $helper->get_tender_invoice_number($company);
        if(!is_null($fee)){
            $invoice = tender_invoice::where(['company_id'=>$company->id,'tendernumber'=>$request->tendernumber])->first();
           if(is_null($invoice)){ 
               $uuid = Str::uuid();
               mybidbonds::create(['tendernumber'=>$request->tendernumber,'uuid'=>$uuid,'company_id'=>$company->id,'closing_date'=>$request->date,'validityperiod'=>$request->period,'maturitydate'=>Carbon::parse($request->date)->addDays($request->period)]);
               tender_invoice::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'tendernumber'=>$request->tendernumber,'type'=>'REFUNDABLE','description'=>'BIDBOND','currency_id'=>$request->currency,'year'=>Carbon::now()->year,'amount'=>$request->amount,'status'=>'PENDING']);
               tender_invoice::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'tendernumber'=>$request->tendernumber,'type'=>'NONREFUNDABLE','description'=>'ADMINISTRATION FEE :ESTABLISHMENT FEE','currency_id'=>$request->currency,'year'=>Carbon::now()->year,'amount'=>$fee->amount,'status'=>'PENDING']);
            return array('status'=>'successMessage','message'=>'Bid Request captured please complete payment');   

           }else{
            return array("status"=>'errorMessage','message'=>'Tender number  already invoiced');
      
           }

        }else{
            return array("status"=>'errorMessage','message'=>'No Administration fee settings found for your bid bond request please contact our offices for assistance');
        }
       
    }

    function getEstablishmentFee($request,$company){
        $fees = bidbondfee::wherecurrency_id($request->currency)->wherelocality($company->locality)->get();
        foreach ($fees as $key => $value) {
             if($value->lowerlimit < $request->amount && $request->amount < $value->upperlimit){
                 $uuid = Str::uuid();
                myadministrationfees::create(['company_id'=>$company->id,'uuid'=>$uuid,'tendernumber'=>$request->tendernumber,'description'=>'ADMINISTRATION FEE :ESTABLISHMENT FEE','currency_id'=>$request->currency,'amount'=>$value->amount]);
         
                 return $value;
            }
        }
    }
}
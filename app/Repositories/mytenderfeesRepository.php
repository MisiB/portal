<?php
namespace App\Repositories;

use App\Helpers\generalHelper;
use App\Interfaces\mytenderfeesInterface;
use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use App\Models\tender_invoice;
use Carbon\Carbon;
use Illuminate\Support\Str;

class mytenderfeesRepository implements mytenderfeesInterface{
    public function mybindbonds($company)
    {
         $bindbonds = mybidbonds::wherecompany_id($company->id)->get();
         return  $bindbonds;
    }

    public function myadministrationfees($company)
    {
         $administration = myadministrationfees::with('company','currency')->wherecompany_id($company->id)->get();
         return $administration;
    }

    public function add($request, $company)
    {
     $helper = new generalHelper();
     $description = 'ADMINISTRATION FEE :'.$request->fee;
     if(!tender_invoice::where(['tendernumber'=>$request->tendernumber,'type'=>'NONREFUNDABLE','description'=>$description])->exists())
     {
      $invoicenumber = $helper->get_tender_invoice_number($company);
      $uuid = Str::uuid();
      tender_invoice::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'tendernumber'=>$request->tendernumber,'type'=>'NONREFUNDABLE','description'=>$description,'currency_id'=>$request->currency,'year'=>Carbon::now()->year,'amount'=>$request->amount,'status'=>'PENDING']);
      myadministrationfees::create(['company_id'=>$company->id,'uuid'=>$uuid,'tendernumber'=>$request->tendernumber,'description'=>$description,'currency_id'=>$request->currency,'amount'=>$request->amount]);
      return array('status'=>'successMessage','message'=>'Fee Successfully added to invoice');   
     }else{
          return array('status'=>'errorMessage','message'=>'Fee already added to invoice');
     }
          
    }

    public function delete($id,$company){
         $invoice = tender_invoice::whereid($id)->wherecompany_id($company->id)->first();
         if(!is_null($invoice))
         {
             if($invoice->status == "PENDING" || $invoice->status == "AWAITING"){
                
               $invoice->status = "CANCELLED";
               $invoice->save();
               return array("status"=>'successMessage',"message"=>'Invoice Successfully Cancelled');

             }else{
               return array("status"=>'errorMessage',"message"=>'Invoice cannot be cancelled');   
             }

         }
         else
         {
          return array("status"=>'errorMessage',"message"=>'Invoice not found');
         }
    }
}
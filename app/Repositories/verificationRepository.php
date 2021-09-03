<?php
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\suppliers;
use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use Carbon\Carbon;
class verificationRepository{

    public function verify(Request $request){
       
         if($request->type === "REGISTRATION")
         {
            return $this->verifyregistration($request->code);
         }elseif ($request->type === "ESTABLISHMENT FEE" || $request->type === "SPOC" ) {
            return $this->verifyadminFee($request->code,$request->type);
         }elseif ($request->type === "BIDBOND") {
             return $this->verifyBidBond($request->code);
         }
    }


 function verifyregistration($code){

    $supplier =  suppliers::with('category','company')->wherecode($code)->first();
   $array=[];
    if(!is_null($supplier))
    {
        $status ="ACTIVE";
       if($supplier->expire_year < Carbon::now()->year){
         $status = "EXPIRED";
       }

      $code =  $supplier->code;
      $category = $supplier->category->name."(".$supplier->category->code.")";
      $name = $supplier->company->name;
      $regnumber = $supplier->company->regnumber;
      $registrationdate = $supplier->created_at;
      $year=$supplier->expire_year;
      $data = array("status"=>$status,"year"=>$year,"code"=>$code,"name"=>$name,"date"=>$registrationdate,"category"=>$category,"regnumber"=>$regnumber);
     $array = array("status"=>'successMessage',"message"=>'Code Found',"data"=>$data);

    }else{
        $array = array("status"=>'errorMessage',"message"=>'Code invalid, Could not be Found',"data"=>[]);
    }

    return $array;

}


function verifyadminFee($code,$type)
{
 $fee = myadministrationfees::with('entity','company','currency')->wherecode($code)->wheredescription($type)->wherepaymentstatus('PAID')->first();

 $array =[];

   if(!is_null($fee)){
     $tendernumber = $fee->tendernumber;
     $entity = $fee->entity->name;
     $company = $fee->company->name;
     $amount = $fee->amount;
     $currency = $fee->currency->name;
     $paymentDate = $fee->updated_at;
     $data = array("tendernumber"=>$tendernumber,"entity"=>$entity,"company"=>$company,"amount"=>$amount,"currency"=>$currency,"paymentdate"=>$paymentDate);

    $array = array("status"=>'successMessage',"message"=>'Code Found',"data"=>$data);

    }else{
        $array = array("status"=>'errorMessage',"message"=>'Code invalid, Could not be Found',"data"=>[]);
    }

    return $array;
}

function verifyBidBond($code){
    $fee = mybidbonds::with('entity','company')->wherecode($code)->wherepaymentstatus('PAID')->first();

    $array =[];
   
      if(!is_null($fee)){
        $tendernumber = $fee->tendernumber;
        $entity = $fee->entity->name;
        $company = $fee->company->name;
        $amount = $fee->amount;
        $currency = $fee->currency;
        $paymentDate = $fee->updated_at;
        $validityperiod = $fee->validityperiod;
        $maturitydate = $fee->maturitydate;
        $data = array("tendernumber"=>$tendernumber,"entity"=>$entity,"company"=>$company,"amount"=>$amount,"currency"=>$currency,"paymentdate"=>$paymentDate,"validityperiod"=>$validityperiod,"maturitydate"=>$maturitydate);
   
       $array = array("status"=>'successMessage',"message"=>'Code Found',"data"=>$data);
   
       }else{
           $array = array("status"=>'errorMessage',"message"=>'Code invalid, Could not be Found',"data"=>[]);
       }
   
       return $array;
}
}
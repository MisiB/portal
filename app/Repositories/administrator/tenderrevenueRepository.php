<?php
namespace App\Repositories\administrator;

use App\Models\tender_invoice;
use Illuminate\Http\Request;

class tenderrevenueRepository{

    public function getReport($from,$to,$currency){

        $data = tender_invoice::with('entity','company','currency')
        ->wherebetween('created_at',[$from,$to])
        ->wherestatus('PAID')
        ->wherecurrency_id($currency)
        ->where('description','!=','BIDBOND')
        ->get();
        $currency = "";
        $total =0;
        $formated=[];
         if(count($data)>0)
         {
           $currency = $data[0]->currency->name;
           $total = $data->sum('amount');
           $formated = $data->map(function($dt){
            return[
               "data"=>$dt->updated_at,
               "invoice_number"=>$dt->invoice_number,
               "company"=>$dt->company->name."-".$dt->company->regnumber,
               "description"=>$dt->description,
               "entity"=>$dt->entity->name,
               "tendernumber"=>$dt->tendernumber,
                "currency"=>$dt->currency->name,
               "amount"=>$dt->amount 
            ];
          });
         }
        
         return array("data"=>$data,"currency"=>$currency,"total"=>$total,"formated"=>$formated);
       

    }

}
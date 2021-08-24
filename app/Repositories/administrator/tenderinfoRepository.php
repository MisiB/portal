<?php
namespace App\Repositories\administrator;

use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use App\Models\tender_invoice;

class tenderinfoRepository{

   public function getList(){

   }  

   public function get_by_invoice($id){

    $invoice = tender_invoice::whereid($id)->first();

    if(!is_null($invoice)){
        if($invoice->type =="NONREFUNDABLE"){

            return myadministrationfees::with('entity')->where(['company_id'=>$invoice->company_id,'tendernumber'=>$invoice->tendernumber])->get()->map(function($tender){
                return[
                    "id"=>$tender->id,
                    "date"=>$tender->updated_at,
                    "tendernumber"=>$tender->tendernumber,
                    "entity"=>$tender->entity->name,
                    "description"=>$tender->description,
                    "currency"=>$tender->currency->name,
                    "status"=>$tender->paymentstatus,
                    "amount"=>$tender->amount,
                    "code"=>$tender->code
                ];
            });
        }
        else{
            return mybidbonds::with('entity')->where(['company_id'=>$invoice->company_id,'tendernumber'=>$invoice->tendernumber])->get()->map(function($tender){
                return[
                    "id"=>$tender->id,
                    "date"=>$tender->updated_at,
                    "tendernumber"=>$tender->tendernumber,
                    "entity"=>$tender->entity->name,
                    "description"=>'BIDBOND',
                    "currency"=>$tender->currency,
                    "status"=>$tender->paymentstatus,
                    "amount"=>$tender->amount,
                    "code"=>$tender->code
                ];
            });
        }
    }
   }
}
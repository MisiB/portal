<?php
namespace App\Helpers;

use App\Models\bidbondcap;
use App\Models\bidbondfee;
use App\Models\entity;
use App\Models\procurementnotices;
use App\Models\spocfees;
use App\Models\tendernumber;
use App\Models\threshold;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
class generalEntityHelper{
    public function getEntity(){
        $user = User::with('entity')->whereid(Auth::user()->id)->first();
        return $user->entity[0];
    }

    public function tendernumber($slug,$noticetype){
        $tendernumber = tendernumber::first();
        $tnumber = $tendernumber->tendernumber;
        $tendernumber->tendernumber = $tnumber+1;
        $tendernumber->save();
        
        $noticetype = strtoupper($noticetype);
        $type = 'DOM';
         if($noticetype==='INTERNATIONAL'){
             $type='INT';
         }
        $type  =  Str::limit($noticetype,3);

        return $slug.'/'.$type.'/'.Carbon::now()->year.'/'.$tnumber;
    }

    public function calculate_cap($bidsecurity,$bidvalue){
        $cap = bidbondcap::first();
        $capvalue = $cap->value;
        $max=  ((int)$capvalue/100)*$bidvalue;
        if($bidsecurity > $max){
            return array('status'=>'errorMessage','message'=>'Bid security can not be more than '.$capvalue.'% of the bid value maximum bid security permitted for  your notice is '.$max);
        }else{
            return array('status'=>'successMessage','message'=>'Proceed');
        }
      
    }

   
    public function calculate_spoc($id){
      $notice = procurementnotices::whereid($id)->first();
      $entity = entity::whereid($notice->entity_id)->first();

      if(!is_null($entity)){
          $procurementclass = $entity->procurementclass;
          if(count($procurementclass)>0){
              $threshold = threshold::whereprocurementclass_id($procurementclass[0]->id)
                                    ->wherecurrency_id($notice->currency_id)
                                    ->whereclassification_id($notice->classification_id)
                                    ->first();

             if(!is_null($threshold)){
                   if($notice->bidvalue  > $threshold->value){
                        $spocfee = spocfees::wherethreshold_id($threshold->id)->first();
                        if(!is_null($spocfee)){
                         return $spocfee->value;
                        }else{
                            return 0;
                        }
                   }else{
                       return 0;
                   }
             }else{
                 return 0;
             }
          }
      }
    }

    public function calculate_establishmentfee($id){
        $notice = procurementnotices::whereid($id)->first();
        $fees = bidbondfee::wherecurrency_id($notice->currency_id)->wherevalidityperiod($notice->validityperiod)->get();

         if(count($fees)>0){
            foreach ($fees as $key => $value) {
                if($value->lowerlimit < $notice->bidsecurity && $notice->bidsecurity < $value->upperlimit){
                    return $value->amount;
                }
            }
         }else{
             return 0;
         }
    }

    public function calculate_contractfee($id){

    }
}
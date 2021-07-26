<?php 
namespace App\Repositories\administrator;

use App\Models\threshold;
use Illuminate\Http\Request;

class thresholdRepository{
    public function getList($status){
        return   threshold::with('procurementclass','classification','currency','spocfees')->wherestatus($status)->get();
        }
        public function create(Request $request){
            if($request->id==''){
                threshold::create(['procurementclass_id'=>$request->procurementclass,'classification_id'=>$request->classification,'locality'=>$request->locality,'currency_id'=>$request->currency,'value'=>$request->value]);
            }else{
                $type = threshold::whereid($request->id)->first();
                $type->procurementclass_id = $request->procurementclass;
                $type->classification_id = $request->classification;
                $type->locality = $request->locality;
                $type->currency_id = $request->currency;
                $type->value = $request->value;
                $type->save();
            }
    
            return array('status'=>'successMessage','message'=>'Threshold Successfully Processed');
        }
    
     public function delete($id){
         $type = threshold::whereid($id)->first();
         $type->status ="DELETED";
         $type->save();
         return array('status'=>'successMessage','message'=>'Threshold Successfully Deleted');
     }
}
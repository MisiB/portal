<?php
namespace App\Repositories\administrator;

use App\Models\procurementclass;
use Illuminate\Http\Request;

class procurementclassRepository{
     
    public function getList($status){
    return  procurementclass::wherestatus($status)->get();
    }
    public function create(Request $request){
        if($request->id==''){
            procurementclass::create(['name'=>$request->name]);
        }else{
            $type = procurementclass::whereid($request->id)->first();
            $type->name = $request->name;
            $type->save();
        }

        return array('status'=>'successMessage','message'=>'Procurement class Successfully Processed');
    }

 public function delete($id){
     $type = procurementclass::whereid($id)->first();
     $type->status ="DELETED";
     $type->save();
     return array('status'=>'successMessage','message'=>'Procurement class Successfully Deleted');
 }
}
<?php
namespace App\Repositories\administrator;

use App\Models\classification;
use Illuminate\Http\Request;

class classificationRepository{
     
    public function getList($status){
    return  classification::wherestatus($status)->get();
    }
    public function create(Request $request){
        if($request->id==''){
            classification::create(['name'=>$request->name]);
        }else{
            $type = classification::whereid($request->id)->first();
            $type->name = $request->name;
            $type->save();
        }

        return array('status'=>'successMessage','message'=>'Classification Successfully Processed');
    }

 public function delete($id){
     $type = classification::whereid($id)->first();
     $type->status ="DELETED";
     $type->save();
     return array('status'=>'successMessage','message'=>'Classification Successfully Deleted');
 }
}
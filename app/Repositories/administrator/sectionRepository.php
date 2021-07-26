<?php
namespace App\Repositories\administrator;

use App\Models\sections;
use Illuminate\Http\Request;

class sectionRepository{
     
    public function getList($status){
    return  sections::wherestatus($status)->get();
    }
    public function create(Request $request){
        if($request->id==''){
            sections::create(['name'=>$request->name]);
        }else{
            $type = sections::whereid($request->id)->first();
            $type->name = $request->name;
            $type->save();
        }

        return array('status'=>'successMessage','message'=>'Supplier TSection Successfully Processed');
    }

 public function delete($id){
     $type = sections::whereid($id)->first();
     $type->status ="DELETED";
     $type->save();
     return array('status'=>'successMessage','message'=>'Supplier Section Successfully Deleted');
 }
}
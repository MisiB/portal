<?php
namespace App\Repositories\administrator;

use App\Models\accounttype;
use Illuminate\Http\Request;

class suppliertypeRepository{
    public function getList($status){
         return accounttype::wherestatus($status)->get();
    }

    public function create(Request $request){
        if($request->id==''){
            accounttype::create(['name'=>$request->name]);
        }else{
            $type = accounttype::whereid($request->id)->first();
            $type->name = $request->name;
            $type->save();
        }

        return array('status'=>'successMessage','message'=>'Supplier Type Successfully Processed');
    }

 public function delete($id){
     $type = accounttype::whereid($id)->first();
     $type->status ="DELETED";
     $type->save();
     return array('status'=>'successMessage','message'=>'Supplier Type Successfully Deleted');
 }
}
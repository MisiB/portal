<?php
namespace App\Repositories\administrator;

use App\Models\procurementtype;
use Illuminate\Http\Request;

class procurementtypeRepository{
    public function getList(){
        return procurementtype::get();
    }

    public function create(Request $request){
        if($request->id ==""){
            procurementtype::create(['name'=>$request->name]);
        }else{
            $type = procurementtype::whereid($request->id)->first();
            $type->name = $request->name;
            $type->save();
        }
        return array('status'=>'successMessage','message'=>'Procurement Type Successfully Created');
    }
}
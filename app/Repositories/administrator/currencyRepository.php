<?php

namespace App\Repositories\administrator;

use App\Models\currency;
use Illuminate\Http\Request;

class currencyRepository{

    public function getList($status){
        return currency::wherestatus($status)->get();
    }

    public function create(Request $request){
        if($request->id==''){
            currency::create(['name'=>$request->name]);
        }else{
            $type = currency::whereid($request->id)->first();
            $type->name = $request->name;
            $type->save();
        }

        return array('status'=>'successMessage','message'=>'Currency Successfully Processed');
    }

    public function delete($id){
        $type = currency::whereid($id)->first();
        $type->status ="DELETED";
        $type->save();
        return array('status'=>'successMessage','message'=>'Currency Successfully Deleted');
    }
}
<?php
namespace App\Repositories\administrator;

use App\Models\banks;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class bankRepository{

    public function getList(){
        return banks::get();
    }

    public function create(Request $request){
        if($request->id==""){
            $code = rand(1000,10000);
            $passcode = Str::uuid();
            banks::create(['name'=>$request->name,'contact'=>$request->contact,'email'=>$request->email,'authcode'=>$code,'passcode'=>$passcode,'status'=>'ACTIVE']);

        }else{
            $bank = banks::whereid($request->id)->first();
            $bank->name = $request->name;
            $bank->email = $request->email;
            $bank->contact = $request->contact;
            $bank->save();
        }

        return array('status'=>'successMessage','message'=>'Succssfully processed bank name');
    }

    public function delete($id){
        $bank = banks::whereid($id)->first();
        $bank->status = 'CANCELLED';
        $bank->save();
        return array('status'=>'successMessage','message'=>'Succssfully deleted bank name');
    }
}
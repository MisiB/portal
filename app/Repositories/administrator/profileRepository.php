<?php
namespace App\Repositories\administrator;

use App\Models\administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileRepository{

    public function update(Request $request){
         if(Hash::check($request->oldpassword,Auth::guard('admin')->user()->password)){
           $user = administrator::whereid(Auth::guard('admin')->user()->id)->first();
           $user->password = Hash::make($request->password);
           $user->save();
           return array('status'=>'successMessage','message'=>'Password successfully changed');
         }else{
             return array('status'=>'errorMessage','message'=>'Current password not found');
         }
    }
}
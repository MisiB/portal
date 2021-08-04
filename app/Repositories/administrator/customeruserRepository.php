<?php

namespace App\Repositories\administrator;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class customeruserRepository{

    public function create(Request $request){
       $password = rand(10000,100000);  
       if($request->id=="")
       {
           $user = User::with('company')->whereemail($request->email)->first();
           if(is_null($user))
           {
            User::create(['company_id'=>$request->company,'name'=>$request->name,'surname'=>$request->surname,'email'=>$request->email,'role_id'=>'9','password'=>bcrypt($password)]);
            return array('status'=>'successMessage','message'=>'Successfully Created User temp password:'.$password);
           }
           else{
               $message= !is_null($user->company) ? 'Email already registered to company :'.$user->company->name : 'Email already in our database  cannot be used';
               return redirect()->back()->with('statusError',$message);
           }
        }
       else{
        $user = User::whereid($request->id)->first();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->save();   
       }
        return array('status'=>'successMessage','message'=>'Successfully Created User temp password:'.$password);
    }

   

    public function resetpassword($id){
        $user = User::whereid($id)->first();
        $password = rand(10000,100000); 
        $user->password = Hash::make($password);
        $user->save();
        return array('status'=>'successMessage','message'=>'Password Successfully reset to :'.$password);

    }

}
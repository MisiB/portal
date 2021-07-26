<?php
namespace App\Repositories\administrator;

use App\interfaces\administrator\loginInterface;
use App\Http\Requests\adminLoginRequest;
use App\Http\Requests\adminchangePasswordRequest;
use App\Http\Requests\adminCreateRequest;
use App\Models\administrator;
use Auth;
use Illuminate\Support\Facades\Hash;

class loginRepository{
    public function Login(adminLoginRequest $request)
    {
       $user = administrator::whereusername($request->username)->first();
       
       if(!is_null($user)){
            if($user->status=='BLOCKED'){
                return array('status'=>'errorMessage','message'=>'OOPS Account Blocked');
            }else{
                 $credentials = $request->only('username','password');
                 if(Auth::guard('admin')->attempt($credentials)){
                     return redirect()->intended(route('admin.home'))->with('successMessage','Welcome back: '.Auth::guard('admin')->user()->name);
                 }else{
                    return redirect()->back()->with('errorMessage','Invalid Username and password Combination');   
                 }
            }
       }else{
           return  redirect()->back()->with('errorMessage','Invalid Username and password Combination');
       }
    }

    public function passwordChange(adminchangePasswordRequest $request, administrator $user)
    {
        if(!Hash::check($request->password,$user->password))
            {
               return  array('status'=>'errorMessage','message'=>'Old Password incorrect');               
            }
            else{
               
                $user->password = bcrypt($request->password);
                $user->reset_date = Carbon::now()->addMonth(1);
                $user->save();

                return array('status'=>'successMessage','message'=>'Password Successfully changed');
            }
    }

    public function changeStatus($status,administrator $user)
    {
        $user->status = $status;
        $user->save();
        return array('status'=>'successMessage','message'=>'Status  Successfully changed');
        
    }

    public function create(adminCreateRequest $request)
    {
        
    }
}
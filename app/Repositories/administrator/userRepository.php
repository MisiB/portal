<?php

namespace APP\Repositories\administrator;

use App\interfaces\administrator\userInterface;
use App\Models\administrator;
use App\Notifications\adminAccountNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userRepository{

    public function getList(Request $request)
    {
      
          return administrator::when($request->term,function($query,$term){
              $query->where('name','LIKE','%'.$term.'%');
              $query->orwhere('surname','LIKE','%'.$term.'%');
              $query->orwhere('email','LIKE','%'.$term.'%');
          })
          ->with('role')
          ->where('status','!=','DELETED')
          ->orderBy('status','DESC')
          ->get();
    }

    public function create(Request $request)
    {
        if($request->id=="")
        {
        $admin = administrator::orderBy('id','desc')->first();
        $username = 'admin_'.($admin->id+1);
        $password = 'temp'.rand(1000,10000);
        $credentials = [
                        'name'=>$request->name,
                        'surname'=>$request->surname,
                        'email'=>$request->email,
                        'username'=>$username,
                        'password'=> Hash::make($password),
                        'status'=>'ACTIVE',
                        'role_id'=>$request->role
        ];
          $user = administrator::create($credentials);
         
          $user->notify(new adminAccountNotification($username,$password));

          return array('status'=>'successMessage','message'=>'User account successfully created password:'.$password);
     }else{
         $admin = administrator::whereid($request->id)->first();
         $admin->name = $request->name;
         $admin->surname = $request->surname;
         $admin->email = $request->email;
         $admin->role_id = $request->role;
        $admin->save();
        return array('status'=>'successMessage','message'=>'User account successfully Updated');
     }
    }

    

    public function delete($id)
    {
         $administrator = administrator::whereid($id)->first();
         if($administrator->id !== Auth::guard('admin')->user()->id){
           $administrator->status='DELETED';
           $administrator->save();
           return array('status'=>'successMessage','message'=>'User account successfully Deleted');
         }else{
             return array('status'=>'errorMessage','message'=>'Use cannot delete his or her own account');
         }
    }

    public function resetPassword($id)
    {
        $administrator = administrator::whereid($id)->first();
        $password = 'temp'.rand(100,1000);
        $administrator->password = Hash::make($password);
        $administrator->save();
        return array('status'=>'successMessage','message'=>'Password changed to:'.$password);
    }

    public function changeStatus(Request $request,$id){
        $administrator = administrator::whereid($id)->first();     
        $administrator->status = $request->status;
        $administrator->save();
        return array('status'=>'successMessage','message'=>'User account  status successfully changed');
    }
}
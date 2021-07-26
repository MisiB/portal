<?php
namespace App\Repositories\administrator;

use App\Models\entity;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\entityUser;
use Illuminate\Support\Facades\Hash;

class entityUserRepository{
    public function create(Request $request){
       $user="";
       $entity = entity::whereid($request->entity)->first();
       $password = rand(10000,100000);
        if($request->id==""){
           
          $user = User::create(['name'=>$request->name,'surname'=>$request->surname,'email'=>$request->email,'role_id'=>$request->role,'password'=>Hash::make($password),'type'=>'ENTITY','status'=>'ACTIVE']);   
          $entity->users()->attach($user);
          $user->notify(new entityUser($request->name,$password,$entity->name,$request->email));
        }else{
            $user = User::whereid($request->id)->first();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->role_id = $request->role;
            $user->save();
        }   
      
   
        return  array('status'=>'successMessage','message'=>'User Successfully Created');
    }

    public function delete($id){
         $user = User::whereid($id)->first();
         $user->status = 'BLOCKED';
         $user->save();
         return  array('status'=>'successMessage','message'=>'User Successfully Deleted');
    }
}
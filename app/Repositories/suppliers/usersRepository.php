<?php
namespace App\Repositories\suppliers;

use App\Http\Requests\userRequest;
use App\Interfaces\suppliers\usersInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class usersRepository implements usersInterface{

    public function getList($company)
    {
      return User::wherecompany_id($company->id)->get();   
    }

    public function create(userRequest $request, $company)
    {
        $user = User::create([
            'name' => $request->name,
            'surname'=>$request->surname,
            'email'=>$request->email,
            'company_id'=>$company->id,
            'role_id'=>'9',
            'status'=>'ACTIVE',
            'password' => Hash::make($request->password)
        ]);

        return $user;
    }

    public function update(userRequest $request,$id)
    {
         $user = User::whereid($id)->first();
         $user->name = $request->name;
         $user->surname = $request->surname;
         $user->email = $request->email;
         $user->status = $request->status;
         $user->save();
         return $user;
    }
}
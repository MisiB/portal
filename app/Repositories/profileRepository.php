<?php


namespace App\Repositories;
use App\Http\Requests\profileCompanyRequest;
use App\Http\Requests\profileRequest;
use App\Http\Requests\profileUserRequest;
use App\Interfaces\profileInterface ;
use App\Models\company;
use App\Models\contacts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileRepository implements profileInterface
{
    public function getProfile()
    {
        // TODO: Implement getProfile() method.

        $user = Auth::user();
        $company = company::whereid($user->company_id)->with('contacts','type')->first();

        return $company;

    }
     public function deleteProfile($id)
     {
         // TODO: Implement deleteProfile() method.
     }

     public function updateUserProfile(profileUserRequest $request)
     {
        $user = User::whereid(Auth::user()->id)->first();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
     }

     public function updateCompanyProfile(profileCompanyRequest $request)
     {
          $contacts = contacts::wherecompany_id(Auth::user()->company_id)->first();
          if(!is_null($contacts)){
              $contacts->emails = $request->emails;
              $contacts->phonenumbers = $request->phones;
              $contacts->address = $request->address;
              $contacts->save();
          }else{
              $contacts = contacts::create(['company_id'=>Auth::user()->company_id,'emails'=>$request->emails,'phonenumbers'=>$request->phones,'address'=>$request->address]);

          }
          return $contacts;
     }
}

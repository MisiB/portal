<?php

namespace App\Http\Controllers;

use App\Http\Requests\profileCompanyRequest;
use App\Http\Requests\profileUserRequest;
use App\Interfaces\profileInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class profileController extends Controller
{

    private  $profile;

    public  function  __construct(profileInterface  $profile){
        $this->profile = $profile;
    }

    public function index()
    {
         $profile = $this->profile->getProfile();
         return Inertia::render('Accounts/users/profile',['company'=>$profile]);
    }

    public  function updateUser(profileUserRequest $request){
     $user = $this->profile->updateUserProfile($request);
     return redirect()->route('dashboard')->with('successMessage','User details successfully Updated');
    }

    public function company(){
        $profile = $this->profile->getProfile();
        return Inertia::render('Accounts/users/companyprofile',['company'=>$profile]);  
    }

    public  function  updateCompany(profileCompanyRequest $request){
       $company = $this->profile->updateCompanyProfile($request);
        return redirect()->route('dashboard')->with('successMessage','Company contacts successfully Updated');
    }





}

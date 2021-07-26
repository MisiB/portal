<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\accountCreationRequest;
use App\Models\accounttype;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{

    private $HELPER;

    public  function  __construct(generalHelper $helper){
        $this->HELPER = $helper;
    }
    public function create()
    {
        $types = accounttype::wherestatus('CREATED')->get();
        return Inertia::render('Auth/Users/Register',['types'=>$types]);
    }

    public function store(accountCreationRequest $request)
    {
          if($this->HELPER->check_company_name($request->company)==0)
          {
              Auth::login($user = $this->HELPER->create_new_company($request));
              event(new Registered($user));
              return redirect()->route('dashboard')->with('successMessage','Account Successfully Created. Welcome to our Public Procurement Portal');
         }else{
             return redirect()->back()->with('errorMessage','Company name Already Exist');
         }
    }
}

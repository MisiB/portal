<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminLoginRequest;
use App\Repositories\administrator\loginRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class authController extends Controller
{
    private $login;

    public function __construct(loginRepository $login)
    {
        $this->login = $login;
    }
      public function loginForm(){
        return Inertia::render('Auth/Admin/Login');
      }

      public function login(adminLoginRequest $request){
        
        return $this->login->login($request);
    
      }
}

<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\customeruserRepository;
use Illuminate\Http\Request;

class customeruserController extends Controller
{
    
    private $user;

    public function __construct(customeruserRepository $user)
    {
        $this->user = $user;
    }
    
    public function store(Request $request)
    {
      $request->validate(['name'=>'required','surname'=>'required','email'=>'required|email|unique:users,id']);
      $response = $this->user->create($request);
      
      return redirect()->back()->with($response['status'],$response['message']);
    }

    
    public function show($id)
    {
     $response  = $this->user->resetpassword($id);
     return redirect()->back()->with($response['status'],$response['message']);
    }

   
}

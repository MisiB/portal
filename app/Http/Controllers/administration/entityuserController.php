<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\entityUserRepository;
use Illuminate\Http\Request;

class entityuserController extends Controller
{
    private $user;

    public function __construct(entityUserRepository $user)
    {
     $this->user = $user;    
    }
    public function index()
    {
        //
    }

   
    public function store(Request $request)
    {
         $request->validate(['name'=>'required','surname'=>'required','email'=>'required|unique:users,id','role'=>'required']);
         $response = $this->user->create($request);
         return redirect()->back()->with($response['status'],$response['message']);
    }

   
    public function destroy($id)
    {
          $response = $this->user->delete($id);
          return redirect()->back()->with($response['status'],$response['message']);
    }
}

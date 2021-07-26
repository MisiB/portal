<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\roleRepository;
use App\Repositories\administrator\userRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class usersController extends Controller
{
    private $users;
    private $roles;

    public function __construct(userRepository $users,roleRepository $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }
   
    public function index(Request $request)
    {
        $users = $this->users->getList($request);
        $roles = $this->roles->getList();
        return  Inertia::render('Accounts/administrator/users/index',compact('roles','users')); 
    }

  
    public function store(Request $request)
    {
        $request->validate(['name'=>'required','surname'=>'required','email'=>'required|unique:administrators,id','role'=>'required']);
        $response = $this->users->create($request);
        return redirect()->back()->with($response['status'],$response['message']);     
    }

  
    public function show($id)
    {
        $response = $this->users->resetPassword($id);
        return redirect()->back()->with($response['status'],$response['message']); 
    }

    public function update(Request $request,$id){       
        $response = $this->users->changeStatus($request,$id);
        return redirect()->back()->with($response['status'],$response['message']);   
    }

   
    public function destroy($id)
    {
        $response = $this->users->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);   
    }
}

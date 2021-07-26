<?php

namespace App\Http\Controllers\supplier\reports;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use Illuminate\Http\Request;
use App\Interfaces\suppliers\usersInterface;
use Inertia\Inertia;

class usersController extends Controller
{
    private $HELPER;

    private $users;

    public function __construct(generalHelper $HELPER,usersInterface $users)
    {
      $this->HELPER = $HELPER;
      $this->users = $users; 
    }

    public function index(){
        $company = $this->HELPER->get_company_name();
        $users = $this->users->getList($company);
        return Inertia::render('Accounts/users/reports/users',['users'=>$users]);
    }

    public function store(userRequest $request){
        $company = $this->HELPER->get_company_name();
        $user = $this->users->create($request,$company);
        return redirect()->back()->with('successMessage','User successfully created');
    }

    public function update(userRequest $request,$id){
        $user = $this->users->update($request,$id);
        
        return redirect()->back()->with('successMessage','User successfully Updated');
    }
}

<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\assignFunctionRepository;
use App\Repositories\administrator\moduleRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class assignfunctionController extends Controller
{
  
    private $modules;
    private $assign;

    public function __construct(moduleRepository $modules,assignFunctionRepository $assign)
    {
     $this->modules = $modules;   
     $this->assign = $assign; 
    }
    public function store(Request $request)
    {
        $response = $this->assign->assign($request->id,$request->role,$request->action,$request->table);
        return redirect()->back()->with($response['status'],$response['message']);
    }

   
    public function show($id)
    {
         $modules = $this->modules->getAssigned($id);
         $roleid = $id;
         return  Inertia::render('Accounts/administrator/roles/assign',compact('modules','roleid'));

    }

    
  
}

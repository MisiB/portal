<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\submoduleRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class submodulesController extends Controller
{
    private $submodule;
    public function __construct(submoduleRepository $submodule)
    {
      $this->submodule = $submodule;   
    }
   
    public function show($uuid)
    {
         $module = $this->submodule->getList($uuid);
         return  Inertia::render('Accounts/administrator/submodules/index',compact('module'));
    }

    
   
    public function store(Request $request)
    {
         $request->validate(['name'=>'required','icon'=>'required','url'=>'required|unique:submodules,id']);
         $response = $this->submodule->create($request);
         return redirect()->back()->with($response['status'],$response['message']);
    }

 
   
   

    public function destroy($id)
    {
          $response = $this->submodule->delete($id);
          return redirect()->back()->with($response['status'],$response['message']);

    }
}

<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\moduleRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class modulesController extends Controller
{
    private $module;

    public function __construct(moduleRepository $module)
    {
     $this->module = $module;   
    }
    public function index()
    {
         $modules = $this->module->getList();
         return  Inertia::render('Accounts/administrator/modules/index',compact('modules'));
    }

   
    public function store(Request $request)
    {
         $request->validate(['name'=>'required','icon'=>'required']);
         $response = $this->module->create($request);
         return redirect()->back()->with($response['status'],$response['message']);
    }

 


 
    public function destroy($id)
    {
         $response = $this->module->delete($id);
         return redirect()->back()->with($response['status'],$response['message']);
    }
}

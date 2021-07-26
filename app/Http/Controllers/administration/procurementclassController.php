<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\procurementclassRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class procurementclassController extends Controller
{
   private $procurementclass;

   public function __construct(procurementclassRepository $procurementclass)
   {
      $this->procurementclass= $procurementclass; 
   }
    public function index()
    {
        $procurementclasses = $this->procurementclass->getList('CREATED');
        return  Inertia::render('Accounts/administrator/procurementclass/index',compact('procurementclasses'));
    }

   
    public function store(Request $request)
    {
         $request->validate(['name'=>'required']);
         $response = $this->procurementclass->create($request);
         return redirect()->back()->with($response['status'],$response['message']);
    }

    
    public function destroy($id)
    {
        $response = $this->procurementclass->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

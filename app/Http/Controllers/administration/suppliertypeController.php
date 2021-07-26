<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\suppliertypeRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class suppliertypeController extends Controller
{
    private $types;

    public function __construct(suppliertypeRepository $types)
    {
        $this->types = $types; 
    }

    public function index()
    {
         $types = $this->types->getList('CREATED');
         return  Inertia::render('Accounts/administrator/suppliertypes/index',compact('types'));
    }

  
    public function store(Request $request)
    {
         $request->validate(['name'=>'required|unique:accounttypes,id']);
          $response = $this->types->create($request);
          return redirect()->back()->with($response['status'],$response['message']);
    }

  
    public function destroy($id)
    {
        $response = $this->types->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

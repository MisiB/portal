<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\supplierRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class pendingsupplierController extends Controller
{
    private $supplier;

    public function __construct(supplierRepository $supplier)
    {
        $this->supplier = $supplier;
    }
   
    public function index(Request $request)
    {
         $response = $this->supplier->getPending($request);
         
         $oldlist = $response['old'];
         $latest = $response['new'];
         return Inertia::render('Accounts/administrator/suppliers/pending',compact('oldlist','latest')); 

    }

    public function show($id){
          $company = $this->supplier->getProfile($id);
          return Inertia::render('Accounts/administrator/suppliers/profile',compact('company')); 

    }

    public function store(Request $request){
        $response = $this->supplier->approve($request);
        return redirect()->back()->with($response['status'],$response['message']);
    }

  
    
}

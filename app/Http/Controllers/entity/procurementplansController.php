<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Repositories\entity\procurementplansRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class procurementplansController extends Controller
{
    
    private $plans;

    public function __construct(procurementplansRepository $plans)
    {
      $this->plans = $plans;   
    }
    public function index()
    {
         $plans = $this->plans->getList();
         return Inertia::render('Accounts/entity/plans/index',compact('plans'));
    }

  
    public function store(Request $request)
    {
        $request->validate(['filename'=>'required|file']);

        $response = $this->plans->create($request);
        return redirect()->back()->with($response['status'],$response['message']);
    }

  
    public function destroy($id)
    {
        //
    }
}

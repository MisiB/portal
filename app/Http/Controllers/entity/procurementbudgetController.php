<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Repositories\entity\procurementbudgetRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class procurementbudgetController extends Controller
{
   private $budgets;

   public function __construct(procurementbudgetRepository $budgets)
   {
       $this->budgets = $budgets; 
   }
    public function index()
    {
        $budgets = $this->budgets->getList();
        return Inertia::render('Accounts/entity/budgets/index',compact('budgets'));
    }

   
    public function store(Request $request)
    {
        $request->validate(['filename'=>'required|file']);

        $response = $this->budgets->create($request);
        return redirect()->back()->with($response['status'],$response['message']);
    }

 
}

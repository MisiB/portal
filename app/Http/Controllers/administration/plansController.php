<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\planRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class plansController extends Controller
{
   private $plans;

    public function __construct(planRepository $plans)
    {
     $this->plans = $plans;
    }
    public function index()
    {
        $plans = $this->plans->getList();
        return  Inertia::render('Accounts/administrator/plans/index',compact('plans'));
    }

   
  
    public function show($id)
    {
        $plans = $this->plans->showList($id);
        return  Inertia::render('Accounts/administrator/plans/show',compact('plans'));
    }

}

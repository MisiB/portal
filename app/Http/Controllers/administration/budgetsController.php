<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\budgetRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class budgetsController extends Controller
{

    private $budgets;

    public function __construct(budgetRepository $budgets)
    {
         $this->budgets = $budgets;
    }
   
    public function index()
    {
        $budgets = $this->budgets->getList();
        return  Inertia::render('Accounts/administrator/budgets/index',compact('budgets'));
    }

 
    public function show($id)
    {
        $budgets = $this->budgets->showList($id);
        return  Inertia::render('Accounts/administrator/budgets/show',compact('budgets'));
    }

   
}

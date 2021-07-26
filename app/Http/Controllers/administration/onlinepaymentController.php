<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\onlinepaymentRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class onlinepaymentController extends Controller
{
    private $onlinepayment;

    public function __construct(onlinepaymentRepository $onlinepayment)
    {
      $this->onlinepayment = $onlinepayment;  
    }
    public function index(Request $request)
    {
       $transactions = $this->onlinepayment->getList($request);      
       return Inertia::render('Accounts/administrator/onlinepayments/index',compact('transactions'));   

    }

   
    public function store(Request $request)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

  
}

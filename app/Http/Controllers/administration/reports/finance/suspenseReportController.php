<?php

namespace App\Http\Controllers\administration\reports\finance;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\suspenseRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class suspenseReportController extends Controller
{
     private $suspense;

     public function __construct(suspenseRepository $suspense){
         $this->suspense  = $suspense;
         $this->middleware("auth:admin");
     }

     public function index(){
         $response = $this->suspense->get_positive_balances();
          $data = $response['data'];
          $summary = $response['summary'];
         return  Inertia::render('Accounts/administrator/reports/finance/suspensereport',compact('data','summary'));

     }
}

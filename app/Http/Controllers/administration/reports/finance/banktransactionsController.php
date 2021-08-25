<?php

namespace App\Http\Controllers\administration\reports\finance;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\bankapiRepository;
use App\Repositories\administrator\tenderinfoRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class banktransactionsController extends Controller
{
 private $banktransactions;

 private $tenderinfo;

  
  public function __construct(bankapiRepository $bankapiRepository,tenderinfoRepository $tenderinfo)
  {
      $this->banktransactions = $bankapiRepository;
      $this->tenderinfo = $tenderinfo;
      $this->middleware('auth:admin');
      
  }

  public function index(Request $request){
    $transactions = $this->banktransactions->getTransaction($request);
    return  Inertia::render('Accounts/administrator/reports/finance/transactions',compact('transactions'));
  }

  public function show($id){
     $data =  $this->tenderinfo->get_by_invoice($id);
     return  Inertia::render('Accounts/administrator/reports/finance/tenderinfo',compact('data'));
  }
}

<?php

namespace App\Http\Controllers\administration\reports\finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\administrator\bidbondrevenueRepository;
use App\Repositories\administrator\currencyRepository;
use Inertia\Inertia;

class bidbondrevenueController extends Controller
{
  

    private $bidbond;
    private $currency;

    public function __construct(bidbondrevenueRepository $bidbond,currencyRepository $currency)
    {
        $this->bidbond = $bidbond;
        $this->currency = $currency;

        $this->middleware("auth:admin");
    }

    public function index()
    {
        $response = $this->bidbond->getList();
        $data = $response['data'];
        $summary = $response['summary'];
        $currencylist = $this->currency->getList('CREATED');
        return  Inertia::render('Accounts/administrator/reports/finance/bidbond',compact('data','summary','currencylist'));

    }

 
    public function store(Request $request)
    {
        $request->validate(['from'=>'required','to'=>'required','currency'=>'required']);
        $response = $this->bidbond->getReport($request->from,$request->to,$request->currency);
        $data = $response['data'];
        $summary = $response['summary'];
        $currencylist = $this->currency->getList('CREATED');
        return  Inertia::render('Accounts/administrator/reports/finance/bidbond',compact('data','summary','currencylist'));
    }

   
}

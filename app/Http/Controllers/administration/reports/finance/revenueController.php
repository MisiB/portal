<?php

namespace App\Http\Controllers\administration\reports\finance;

use App\Exports\revenueReport;
use App\Http\Controllers\Controller;
use App\Repositories\administrator\currencyRepository;
use Illuminate\Http\Request;

class revenueController extends Controller
{
  
    private $currency;

    public function __construct(currencyRepository $currency)
    {
      $this->currency = $currency;   
    }
    public function index()
    {
         $currency = $this->currency->getList('CREATED');
         return view('reports.finance.revenue',compact('currency'));
    }

  
    public function store(Request $request)
    {
        $request->validate(['startdate'=>'required','enddate'=>'required','currency'=>'required']);
      
        return(new revenueReport($request->startdate,$request->enddate,$request->currency))->download('report.xlsx');
    }

  
}

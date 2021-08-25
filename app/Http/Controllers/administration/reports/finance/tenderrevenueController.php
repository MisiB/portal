<?php

namespace App\Http\Controllers\administration\reports\finance;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\currencyRepository;
use App\Repositories\administrator\tenderfeeRepository;
use App\Repositories\administrator\tenderrevenueRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class tenderrevenueController extends Controller
{
    
    private $tenderfees;
    private $currency;
    private $report;
    public function __construct(tenderfeeRepository $tenderfees,currencyRepository $currency,tenderrevenueRepository $report)
    {
        $this->tenderfees = $tenderfees;
        $this->currency = $currency;
        $this->report = $report;
        $this->middleware("auth:admin");
    }
    public function index()
    {
         $currencylist = $this->currency->getList('CREATED');
         $tenderfees = $this->tenderfees->getList()->where('name','!=','BIDBOND');
         $report = $this->report->getReport(Carbon::yesterday(),Carbon::tomorrow(),'2');

         $data = $report['data'];
         $total = $report['total'];
         $currency = $report['currency'];
         $formated= $report['formated'];
         $summary  =[];
         if(count($data)>0)
         {
         $grouped = $data->groupBy('description');
         foreach ($grouped as $key => $value) {
           $summary[]= array("fee"=>$key,"total"=>round($value->sum('amount')));
         }
 
         }
 
         return  Inertia::render('Accounts/administrator/reports/finance/tenderrevenue',compact('currencylist','tenderfees','data','currency','total','summary','formated'));
    }

 
    public function store(Request $request)
    {
        $currencylist = $this->currency->getList('CREATED');
        $tenderfees = $this->tenderfees->getList();
        $report = $this->report->getReport($request->from,$request->to,$request->currency);
        $data = $report['data'];
        $total = $report['total'];
        $currency = $report['currency'];
        $formated= $report['formated'];
        $summary  =[];
        if(count($data)>0)
        {
        $grouped = $data->groupBy('description');
        foreach ($grouped as $key => $value) {
          $summary[]= array("fee"=>$key,"total"=>round($value->sum('amount')));
        }

        }

        return  Inertia::render('Accounts/administrator/reports/finance/tenderrevenue',compact('currencylist','tenderfees','data','currency','total','summary','formated'));
    }

   
}

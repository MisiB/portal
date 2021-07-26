<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\returnsRepository;
use App\Repositories\administrator\revenuereportRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class revenuereportController extends Controller
{
    private $report;

    public function __construct(revenuereportRepository $report)
    {
     $this->report = $report;    
    }
    public function index(Request $request)
    {
        $response = $this->report->getList($request);
        $suppliers = $response['suppliers'];
        $currencylist = $response['currencylist'];   
        $currency = $response['currencyname']; 
        $totalreceipted = $response['totalreceipted'];
        $totalinvoiced = $response['totalinvoiced'];
        $totalregistered = $response['totalregistered'];  
        $balance = $totalinvoiced - $totalreceipted;
        return  Inertia::render('Accounts/administrator/reports/finance/revenue',compact('suppliers','currencylist','totalreceipted','totalinvoiced','totalregistered','currency','balance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['fromdate'=>'required','todate'=>'required','status'=>'required','currency'=>'required']);
        $response = $this->report->getList($request);
        $suppliers = $response['suppliers'];
        $currencylist = $response['currencylist'];   
        $totalreceipted = $response['totalreceipted'];
        $totalinvoiced = $response['totalinvoiced'];
        $totalregistered = $response['totalregistered']; 
        $currency = $response['currencyname'];  
        $balance = $totalinvoiced - $totalreceipted;
        return  Inertia::render('Accounts/administrator/reports/finance/revenue',compact('suppliers','currencylist','totalreceipted','totalinvoiced','totalregistered','currency','balance'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

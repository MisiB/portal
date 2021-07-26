<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\awaitingSupplierInvoicesRepository;
use App\Repositories\administrator\awaitingTenderinvoicesRepository;
use App\Repositories\administrator\bankapiRepository;
use App\Repositories\commands\tenderInvoicesRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class awaitingInvoicesController extends Controller
{
  
    private $awaitingsupplierinvoices;
    private $awaitingtenderinvoices;
    private $bankapi;
    private $tenderprocessing;

    public function __construct(tenderInvoicesRepository $tenderprocessing,awaitingTenderinvoicesRepository $awaitingtenderinvoices,bankapiRepository $bankapi,awaitingSupplierInvoicesRepository $awaitingsupplierinvoices)
    {
       $this->awaitingsupplierinvoices = $awaitingsupplierinvoices;
       $this->awaitingtenderinvoices = $awaitingtenderinvoices;
       $this->bankapi = $bankapi;  
       $this->tenderprocessing = $tenderprocessing;
    }
    public function index(Request $request)
    {
       
         $tenderinvoices = $this->awaitingtenderinvoices->getList();        
         $transactions=[];
         return Inertia::render('Accounts/administrator/invoices/awaitingtenders',compact('tenderinvoices','transactions'));
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
       $response = $this->bankapi->update($request->id,$request->rtgs); 

       return redirect()->back()->with($response['status'],$response['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
       $response =  $this->awaitingtenderinvoices->getItem($id);
       $total = $response['total'];
       $receipted= $response['receipted'];
       $invoice =$response['invoice'];
       $wallet=$response['wallet'];
       $transactions = [];
       return Inertia::render('Accounts/administrator/invoices/tendershow',compact('id','total','receipted','invoice','wallet','transactions'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = $this->tenderprocessing->processtenderid($id);

        if($response['status']=='successMessage'){
            return redirect()->route('awaitinginvoices.index')->with($response['status'],$response['message']);
        }else{
            return redirect()->back()->with($response['status'],$response['message']); 
        }
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
       $response =  $this->awaitingtenderinvoices->getItem($id);
       $total = $response['total'];
       $receipted= $response['receipted'];
       $invoice =$response['invoice'];
       $wallet=$response['wallet'];
       
       $transactions = $this->bankapi->getListByAccount($request->term,$invoice->currency->name);
       return Inertia::render('Accounts/administrator/invoices/tendershow',compact('id','total','receipted','invoice','wallet','transactions'));

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

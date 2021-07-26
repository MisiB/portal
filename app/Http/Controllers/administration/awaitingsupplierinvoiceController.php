<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\administrator\awaitingSupplierInvoicesRepository;
use App\Repositories\administrator\bankapiRepository;
use App\Repositories\commands\supplierInvoicesRepository;
use Inertia\Inertia;
class awaitingsupplierinvoiceController extends Controller
{
    private $awaitingsupplierinvoices;
    private $bankapi;
    private $supplierprocessing;

    public function __construct(supplierInvoicesRepository $supplierprocessing,awaitingSupplierInvoicesRepository $awaitingsupplierinvoices,bankapiRepository $bankapi){
        $this->awaitingsupplierinvoices = $awaitingsupplierinvoices;
        $this->bankapi  = $bankapi;
        $this->supplierprocessing = $supplierprocessing;
    }
    public function index(Request $request)
    {
        $supplierinvoices = $this->awaitingsupplierinvoices->getList();          
         return Inertia::render('Accounts/administrator/invoices/awaitingsuppliers',compact('supplierinvoices'));

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
        $response = $this->awaitingsupplierinvoices->getInvoice($id);
        $total = $response['total'];
        $receipted= $response['receipted'];
        $invoices =$response['invoices'];
        $wallet=$response['wallet'];
        $balance = $response['balance'];
        $transactions = [];
        return Inertia::render('Accounts/administrator/invoices/suppliershow',compact('id','balance','total','receipted','invoices','wallet','transactions'));
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($inv)
    {
        $response = $this->supplierprocessing->processRegistration($inv);
       
        if($response['status']=='successMessage'){
            return redirect()->route('awaitingsupplierinvoices.index')->with($response['status'],$response['message']);
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
        $response = $this->awaitingsupplierinvoices->getInvoice($id);
  
        $total = $response['total'];
        $receipted= $response['receipted'];
        $invoices =$response['invoices'];
        $wallet=$response['wallet'];
        $balance = $response['balance'];
       
        $transactions = $this->bankapi->getListByAccount($request->term,$invoices[0]->currency->name);
         return Inertia::render('Accounts/administrator/invoices/suppliershow',compact('id','balance','total','receipted','invoices','wallet','transactions'));
 
       
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

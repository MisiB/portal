<?php

namespace App\Http\Controllers\tenders;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\suspenseInterface;
use App\Interfaces\tenderfeePaymentInterface;
use App\Models\tender_invoice;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PDF;
class paymentController extends Controller
{
    
    private $HELPER;

    private $payment;

    private $suspense;
    

    public function __construct(generalHelper $HELPER,suspenseInterface $suspense,tenderfeePaymentInterface $payment)
    {
        $this->HELPER = $HELPER;
        $this->payment = $payment; 
        $this->suspense = $suspense;
    }
    public function index() 
    {
         $company = $this->HELPER->get_company_name();
         $invoices =  $this->payment->getPending($company);
         $totalDue = $invoices->sum('amount');
         $totalPaid = count($invoices[0]->receipts) > 0 ? $invoices[0]->receipts->sum('amount') : 0;
         return Inertia::render('Accounts/users/tenders/fees/payment',compact('invoices','totalDue','totalPaid'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = tender_invoice::whereinvoice_number($id)->get();
        $pdf = PDF::loadView('tenderinvoice',['invoice'=>$invoice]);
        return $pdf->download($invoice[0]->invoice_number.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->HELPER->get_company_name();
         $invoices =  $this->payment->getPendingByType($company,$id);
        
         if(count($invoices)>0)
         {
           
         $accountnumber = $this->HELPER->getAccountNumber($company,$invoices[0]->currency->name,$id);
         $balance=0;
        if(count($accountnumber)>0)
          {
            for ($i=0; $i < count($accountnumber); $i++) { 
             $balance = $balance+$this->suspense->getBalance($company,$accountnumber[$i]['accountnumber']);
            }
         
          }
          
       
          $totalDue=$invoices->sum('amount');
          $totalPaid = count($invoices[0]->receipts) > 0 ? $invoices[0]->receipts->sum('amount') : 0;
          $due = $totalDue-$totalPaid;
          $currency = $invoices[0]->currency->name;
          $type = $id;
         $ENABLE_ECOCASH = true;
          if($id=='REFUNDABLE'){
              $ENABLE_ECOCASH=false; 
          }

         
         

          return Inertia::render('Accounts/users/tenders/fees/receipting',compact('invoices','totalDue','totalPaid','due','balance','currency','ENABLE_ECOCASH','type'));
        }else{
          return redirect()->back()->with('errorMessage','No pending invoice found');
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
        $company = $this->HELPER->get_company_name();
        $response = $this->payment->removeitem($id,$company);
        if($response['status']=='successMessage'){
           return redirect()->route('Mytenders.index')->with($response['status'],$response['message']);
        }else{
            return redirect()->back()->with($response['status'],$response['message']);
        }

    }
}

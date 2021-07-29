<?php

namespace App\Http\Controllers\supplier;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\invoicingRequest;
use App\Interfaces\categoryInterface;
use App\Interfaces\currencyInterface;
use App\Interfaces\regyearInterface;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Models\nonrefundable_invoices;
use App\Services\invoicePDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use PDF;

class invoicingController extends Controller
{
   private  $invoicing;
   private  $HELPER;
   private  $currency;
   private  $regyear;
   private  $category;
   private  $pdf;

   public  function  __construct(supplier_invoicing_Interface $invoicing,generalHelper $helper,currencyInterface $currency,regyearInterface $regyear,categoryInterface $category,invoicePDF $pdf)
   {
       $this->invoicing = $invoicing;
       $this->HELPER = $helper;
       $this->regyear = $regyear;
       $this->currency = $currency;
       $this->category = $category;
       $this->pdf = $pdf;
   }

    public function index()
    {
        $company = $this->HELPER->get_company_name();
        $invoices = $this->invoicing->getInvoice($company);
        $total = count($invoices)>0 ? $invoices->sum('cost') : 0;
        $receipted = count($invoices)>0 ? $invoices[0]->receipts->sum('amount') :0;
        return Inertia::render('Accounts/users/registration/invoicing',['invoices'=>$invoices,'totalinvoiced'=>$total,'totalreceipted'=>$receipted]);
    }


    public function create()
    {
        $company = $this->HELPER->get_company_name();
        $categorylist =  $this->category->getList('CREATED');
        $currency= $this->currency->getBylocality('CREATED',$company);
        
        $regyears = $this->regyear->getActiveYears();
        return Inertia::render('Accounts/users/registration/addItem',['categorylist'=>$categorylist,'currencylist'=>$currency,'regyears'=>$regyears]);
    }


    public function store(invoicingRequest $request)
    {
        $company = $this->HELPER->get_company_name();
        if(is_null($this->invoicing->checkItem($request->category,$request->year,$company))) {
            $invoice = $this->invoicing->addItem($request, $company);
            if($invoice['status']=='success') {
                return redirect()->route('Invoicing.index')->with('successMessage',$invoice['message']);
            }else{
                return redirect()->back()->with('errorMessage',$invoice['message']);
            }
        }else{
            return redirect()->back()->with('errorMessage','Category already Add to an invoice that has not yet been settled or Cancelled');
        }

    }


    public function show($id)
    {
        $invoice = nonrefundable_invoices::whereinvoice_number($id)->get();
        $pdf = PDF::loadView('invoice',['invoice'=>$invoice]);
        return $pdf->download($invoice[0]->invoice_number.'.pdf');
     /*  return response($this->pdf->generate($id), 200)->withHeaders([
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "{$this->pdf->action()}; filename='invoice-{$invoice->invoice_number}.pdf'",
        ]); */
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $status = $this->invoicing->removeItem($id);
      
        if($status['status']=='APPROVED' || $status['status']=='PENDING')
        {
            return  redirect()->route('payment')->with('successMessage','Registration successfully completed');
        }
        else{
            return redirect()->back()->with($status['status'],$status['message']);
        }
    }
}

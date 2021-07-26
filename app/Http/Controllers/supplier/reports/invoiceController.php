<?php

namespace App\Http\Controllers\supplier\reports;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class invoiceController extends Controller
{
  private $invoice;
  private $HELPER;

  public function __construct(supplier_invoicing_Interface $invoice,generalHelper $HELPER)
  {
     $this->invoice = $invoice;
     $this->HELPER = $HELPER;  
  }

  public function index(){
      $company = $this->HELPER->get_company_name();
      $invoices = $this->invoice->getInvoices($company,['PENDING','AWAITING','PAID','CANCELLED']);
      return Inertia::render('Accounts/users/reports/invoices',['invoices'=>$invoices]);
  }

  public function show($invoicenumber){
    $response = $this->invoice->verifyInvoice($invoicenumber);
    return redirect()->back()->with($response['status'],$response['message']);
  }
}

<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Interfaces\currencyInterface;
use App\Repositories\administrator\bankapiRepository;
use App\Repositories\administrator\entityRepository;
use App\Repositories\administrator\tenderInvoicingRepository;
use Illuminate\Http\Request;
use App\Repositories\administrator\tenderReceiptingRepository;
use App\Repositories\currencyRepository;
use Inertia\Inertia;

class tenderreceiptingController extends Controller
{
  
   private $bankapi;
   private $invoicing;
    private  $receipting;
   public function __construct(bankapiRepository $bankapi,tenderInvoicingRepository $invoicing,tenderReceiptingRepository $receipting)
   {
    $this->bankapi = $bankapi;
    $this->invoicing = $invoicing;
    $this->receipting = $receipting;
   }
    public function index(Request $request)
    {
        $transactions=$this->bankapi->getList($request);
        $invoices = $this->invoicing->getInvoice($request->id);
        $totalinvoice = $invoices->sum('amount');
        $totalreceipt = $invoices[0]->receipts()->sum('amount');
        return  Inertia::render('Accounts/administrator/tenderreceipting/index',compact('invoices','transactions','totalinvoice','totalreceipt'));
    }

  
  
    public function store(Request $request)
    {
        $request->validate(['name'=>'required','paymentdate'=>'required','filename'=>'required|file']);
       $response = $this->receipting->add($request);
       return redirect()->back()->with($response['status'],$response['message']);
    }

    public function update(Request $request,$id){
        $invoices = $this->invoicing->getInvoice($id);
        $transactions=$this->bankapi->getListByAccount($request);

       
        return  Inertia::render('Accounts/administrator/tenderreceipting/index',compact('invoices','transactions'));  
    }
    public function show($id)    {
        
        $transactions=[];
        $invoices = $this->invoicing->getInvoice($id);
        if(count($invoices)>0)
        {
        $totalinvoice = $invoices->sum('amount');
        $totalreceipt = $invoices[0]->receipts()->sum('amount');
        return  Inertia::render('Accounts/administrator/tenderreceipting/index',compact('invoices','transactions','totalinvoice','totalreceipt'));
        }
        else{
            return redirect()->route('tenderinvoicing.show',$id);
        }  
    }

  
   
    public function destroy($id)
    {
      $response= $this->invoicing->removeItem($id);
     return redirect()->back()->with($response['status'],$response['message']);
    }
}

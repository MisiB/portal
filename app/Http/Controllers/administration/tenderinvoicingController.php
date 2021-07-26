<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Interfaces\currencyInterface;
use App\Repositories\administrator\bankapiRepository;
use App\Repositories\administrator\entityRepository;
use App\Repositories\administrator\tenderInvoicingRepository;
use App\Repositories\administrator\tenderReceiptingRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class tenderinvoicingController extends Controller
{
    private $profile;
    private $entity;
    private $currency;
    private $bankapi;
    private $invoicing;
 
 
    public function __construct(tenderReceiptingRepository $profile,tenderInvoicingRepository $invoicing,entityRepository $entity,currencyInterface $currency,bankapiRepository $bankapi)
    {
     $this->profile = $profile;   
     $this->entity = $entity;
     $this->currency = $currency;
     $this->bankapi = $bankapi;
     $this->invoicing = $invoicing;
    }
 
    public function store(Request $request)
    {
          $request->validate(['tendernumber'=>'required','entity'=>'required','fee'=>'required','currency'=>'required','amount'=>'required','company'=>'required','period'=>'required_if:fee,BIDBOND','date'=>'required_if:fee,BIDBOND','filename'=>'required|file','bank'=>'required']);
          $response=$this->invoicing->addItem($request);
          return redirect()->back()->with($response['status'],$response['message']);
    }

  
    public function show($id)
    {
        $profile = $this->profile->getProfile($id);
        $entity = $this->entity->getEntities();
        $currency = $this->currency->getList('CREATED');
        $invoices = $this->invoicing->getInvoice($id);
        if(count($invoices)>0){
            return redirect()->route('tenderreceipting.show',$id);   
        }
        $transactions=[];
        return  Inertia::render('Accounts/administrator/tenderinvoicing/index',compact('profile','entity','currency','transactions'));

    }

    
    public function destroy($id)
    {
        //
    }
}

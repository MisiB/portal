<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Interfaces\currencyInterface;
use App\Repositories\administrator\bankapiRepository;
use App\Repositories\administrator\bankRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class bankapiController extends Controller
{
   private $bankapi;
   private $currency;
   private $banks;

   public function __construct(bankapiRepository $bankapi,currencyInterface $currency,bankRepository $banks)
   {
      $this->bankapi = $bankapi;  
      $this->currency = $currency;
      $this->banks = $banks;
   }
    public function index(Request $request)
    {
      $response = $this->bankapi->getLatest();
      $transactions = $response['transactions'];
      $awaiting = $response['awaiting'];
      $currency = $this->currency->getList('CREATED');
      $banks = $this->banks->getList();
      return Inertia::render('Accounts/administrator/bankapi/index',compact('transactions','awaiting','currency','banks'));     
    }

 
    public function store(Request $request)
    {
        $request->validate(['bank'=>'required','currency'=>'required','description'=>'required','accountnumber'=>'required','amount'=>'required','sourcereference'=>'required','referencenumber'=>'required','paymentdate'=>'required']);
        $response = $this->bankapi->create($request);

        return redirect()->back()->with($response['status'],$response['message']);
    }

    public function update(Request $request,$id){
      $response = $this->bankapi->approve($request,$id);
      return redirect()->back()->with($response['status'],$response['message']);

    }
  
    public function destroy($id)
    {
         $response = $this->bankapi->delete($id);
         return redirect()->back()->with($response['status'],$response['message']);
    }
}

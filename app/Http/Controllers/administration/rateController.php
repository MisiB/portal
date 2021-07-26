<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\bankrateRepository;
use App\Repositories\administrator\currencyRepository;
use App\Repositories\administrator\internalrateRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class rateController extends Controller
{
  
    private $internalrates;
    private $bankrates;
    private $currency;

    public function __construct(internalrateRepository $internalrates, bankrateRepository $bankrates,currencyRepository $currency)
    {
        $this->internalrates = $internalrates;
        $this->bankrates = $bankrates; 
        $this->currency = $currency;
    }
    public function index()
    {
        $internalrates = $this->internalrates->getList('CREATED');
        $bankrates=$this->bankrates->getList('CREATED');
        $currency = $this->currency->getList('CREATED');
        return  Inertia::render('Accounts/administrator/rates/index',compact('internalrates','bankrates','currency'));
    }

 
    public function store(Request $request)
    {
          $request->validate(['other'=>'required','base'=>'required','value'=>'required','type'=>'required']);
          $response =[];
           if($request->type =='internal'){
          $response = $this->internalrates->create($request);      
           }else{
               $response= $this->bankrates->create($request);
           }

           return redirect()->back()->with($response['status'],$response['message']);
    }

  
    public function update(Request $request,$id)
    {
        $response = [];
      if($request->type=='internal'){
         $response = $this->internalrates->delete($id);
      }else{
       $response = $this->bankrates->delete($id);
      }
      return redirect()->back()->with($response['status'],$response['message']);
    }
}

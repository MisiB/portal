<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\currencyRepository;
use App\Repositories\administrator\supplierpriceRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class supplierpriceController extends Controller
{
    private $pricings;
    private $currency;
    public function __construct(supplierpriceRepository $pricings,currencyRepository $currency)
    {
      $this->pricings = $pricings;  
      $this->currency = $currency;
    }
    public function index()
    {
         $prices = $this->pricings->getList('CREATED');
         $currency = $this->currency->getList('CREATED');

         return  Inertia::render('Accounts/administrator/prices/supplier',compact('prices','currency'));
    }

   
    public function store(Request $request)
    {
        $request->validate(['currency'=>'required','locality'=>'required','action'=>'required','price'=>'required']);
        $response = $this->pricings->create($request);
        return redirect()->back()->with($response['status'],$response['message']);
    }

   
    public function destroy($id)
    {
        $response = $this->pricings->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

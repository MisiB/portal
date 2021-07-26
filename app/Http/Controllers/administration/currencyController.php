<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\currencyRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class currencyController extends Controller
{
   
    private $currency;

    public function __construct(currencyRepository $currency)
    {
        $this->currency = $currency;  
    }
    public function index()
    {
        $currency = $this->currency->getList('CREATED');
        return  Inertia::render('Accounts/administrator/currency/index',compact('currency'));
    }

   
   
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|unique:currencies,id']);
        $response = $this->currency->create($request);
        return redirect()->back()->with($response['status'],$response['message']);
    }

   
    public function destroy($id)
    {
        
        $response = $this->currency->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

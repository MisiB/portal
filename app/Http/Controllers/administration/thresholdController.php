<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\classificationRepository;
use App\Repositories\administrator\currencyRepository;
use App\Repositories\administrator\procurementclassRepository;
use App\Repositories\administrator\thresholdRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class thresholdController extends Controller
{
    private $procurementclass;
    private $classification;
    private $currency;
    private $threshold;

    public function __construct(procurementclassRepository $procurementclass,classificationRepository $classification,currencyRepository $currency,thresholdRepository $threshold)
    {
         $this->procurementclass = $procurementclass;
         $this->classification = $classification;
         $this->currency = $currency;
         $this->threshold = $threshold; 
    }

    public function index()
    {
        $procurementclass = $this->procurementclass->getList('CREATED');
        $classification = $this->classification->getList('CREATED');
        $currency = $this->currency->getList('CREATED');
        $threshold = $this->threshold->getList('CREATED');
        return  Inertia::render('Accounts/administrator/threshold/index',compact('procurementclass','classification','currency','threshold'));
    }

    
    public function store(Request $request)
    {
          $request->validate(['currency'=>'required','classification'=>'required','procurementclass'=>'required','locality'=>'required','value'=>'required']);
          $response = $this->threshold->create($request);
          return redirect()->back()->with($response['status'],$response['message']);
    }

    public function destroy($id)
    {
        $response = $this->threshold->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

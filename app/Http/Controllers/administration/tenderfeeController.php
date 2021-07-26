<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\contractfeeRepository;
use App\Repositories\administrator\currencyRepository;
use App\Repositories\administrator\establishmentRepository;
use App\Repositories\administrator\thresholdRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class tenderfeeController extends Controller
{
  
    private $currency;
    private $establishment;
    private $contract;
    private $threshold;

    public function __construct(currencyRepository $currency,establishmentRepository $establishment, contractfeeRepository $contract,thresholdRepository $threshold)
    {
        $this->currency = $currency;  
        $this->establishment = $establishment;
        $this->contract = $contract;
        $this->threshold = $threshold;
    }
    public function index()
    {
        $contractfees=$this->contract->getList('CREATED');
        $establishmentfees=$this->establishment->getList('CREATED');
        $threshold=$this->threshold->getList('CREATED');
        $currency = $this->currency->getList('CREATED');
        return  Inertia::render('Accounts/administrator/tenderfees/index',compact('contractfees','establishmentfees','threshold','currency'));
    }

 
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}

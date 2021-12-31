<?php

namespace App\Http\Controllers\administration\reports\finance;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Repositories\administrator\customerRepository;
use App\Repositories\administrator\wallettransferRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class wallettransferController extends Controller
{
    private $helper;

    private $customer;

    private $wallet;

    public function __construct(generalHelper $helper,customerRepository $customer,wallettransferRepository $wallet)
    {
         $this->helper = $helper;
         $this->customer =$customer;
         $this->wallet = $wallet;
    }

    public function index(Request $request){
        $accountnumbers = $this->helper->get_accounts();
        $customer ="";
        $suspense =[];

        if(!is_null($request->regnumber)){
            $customer = $this->customer->find($request->regnumber);
            if(!is_null($customer)){
            $suspense = $this->wallet->getBalances($customer->id,$accountnumbers);
            }else{
                return redirect()->back()->with('statusError',"Customer not found");
            }
        }

        return  Inertia::render('Accounts/administrator/reports/finance/suspensebalances',compact('suspense','customer','accountnumbers'));
    }

    public function store(Request $request){
        $request->validate(['amount'=>'required','accountnumber'=>'required','filename'=>'required|file']);
        return $this->wallet->requestTransfer($request);
    }

    public function show($id){
        return $this->wallet->approveTransfer($id);
    }


}

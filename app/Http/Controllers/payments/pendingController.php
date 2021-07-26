<?php

namespace App\Http\Controllers\payments;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\mobilepaymentsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class pendingController extends Controller
{

    private $mobile;
    private $HELPER;

    public function __construct(mobilepaymentsInterface $mobile,generalHelper $helper){
        $this->mobile = $mobile;
        $this->HELPER = $helper;
    }
    public function index()
    {
        $company = $this->HELPER->get_company_name();
        $online = $this->mobile->pending($company);
        if(count($online)>0) {
            return Inertia::render('Accounts/users/payments/pending', ['online' => $online]);
        }else{
            return redirect()->route('dashboard');
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $company = $this->HELPER->get_company_name();
        $online = $this->mobile->checkPending($company);
        Log::info($online);
        return redirect()->route('dashboard')->with('successMessage','Pending payments successfully checked');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\supplier\reports;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\banktransactionsInterface;
use App\Interfaces\paynowInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class paymentsController extends Controller
{
      private $HELPER;

      private $online;

      private $bank;

      public function __construct(generalHelper $HELPER,banktransactionsInterface $bank,paynowInterface $online)
      {
       $this->HELPER = $HELPER;   
       $this->bank = $bank;
       $this->online = $online;
      }

      public function index(){
          $company = $this->HELPER->get_company_name();
          $online = $this->online->getList($company);
          $bank = $this->bank->getList($company);
          return Inertia::render('Accounts/users/reports/payments',['onlinepayments'=>$online,'bankpayments'=>$bank]);
      }

      public function show($id){
          $company = $this->HELPER->get_company_name();
          $response = $this->online->check_by_id($id,$company);
          return redirect()->back()->with($response['status'],$response['message']);
      }
}

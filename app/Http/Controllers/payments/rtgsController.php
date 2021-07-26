<?php

namespace App\Http\Controllers\payments;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\rtgsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class rtgsController extends Controller
{

    private $HELPER;
    private $rtgs;

    public function __construct(generalHelper $HELPER , rtgsInterface $rtgs)
    {
        $this->HELPER = $HELPER;
        $this->rtgs = $rtgs;
    }
      public function index(){
        return Inertia::render('Accounts/users/payments/rtgs');
      }

      public function store(Request $request){
         $company = $this->HELPER->get_company_name();
         $response = $this->rtgs->upload($company,$request);
          return redirect()->route('dashboard')->with($response['status'],$response['message']);
      }

      public function show($invoicenumber){
    

      }
}

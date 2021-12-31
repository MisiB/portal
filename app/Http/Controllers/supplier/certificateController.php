<?php

namespace App\Http\Controllers\supplier;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\suppliers\certificateInterface;
use Illuminate\Http\Request;
use PDF;

class certificateController extends Controller
{
     private $certificate;
     private $HELPER;

     public function __construct(certificateInterface $certificate,generalHelper $HELPER)
     {
          $this->certificate = $certificate;
          $this->HELPER = $HELPER;
     }

     public function show($uuid){
       $company = $this->HELPER->get_company_name();
       $response = $this->certificate->getCertificate($company,$uuid); 
       if($response['status']=='success'){
           // return view()
       $pdf = PDF::loadView('suppliers.certificate',['supplier'=>$response['supplier']]);
    
        return $pdf->download($response['supplier']->category->code.'.pdf');
        // return view('suppliers.certificate',['supplier'=>$response]);
       }else{
           return redirect()->route('dashboard')->with('errorMessage',$response['message']);
       }
     }
}

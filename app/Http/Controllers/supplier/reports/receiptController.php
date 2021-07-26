<?php

namespace App\Http\Controllers\supplier\reports;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\suppliers\receiptsInterface;
use Illuminate\Http\Request;
use PDF;
class receiptController extends Controller
{
       private $HELPER;

       private $receipts;

       public function __construct(generalHelper $HELPER,receiptsInterface $receipts)
       {
             $this->HELPER = $HELPER;
             $this->receipts = $receipts;
       }

       public function index(){

       }

       public function show($invoicenumber){
           $receipts = $this->receipts->getReceipt($invoicenumber);

           $pdf = PDF::loadView('receipt',['receipts'=>$receipts]);
           return $pdf->download($invoicenumber.'.pdf');
       }
}

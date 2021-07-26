<?php

namespace App\Http\Controllers\payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\paynowInterface;
use Inertia\Inertia;

class paynowController extends Controller
{
     private $paynow;

     public function __construct(paynowInterface $paynow)
     {
          $this->paynow = $paynow;
     }

     public function initiate(){
         $response = $this->paynow->initiate();
     
         if($response['status']=='settled'){
            return redirect()->route('dashboard')->with('successMessage','Registration Successfully Completed');
         }else{
         if($response['status']=='success'){
             return Inertia::location($response['data']);
           //  return redirect()->back()->with('link',$response['data']);
         }else{

            return redirect()->back()->with($response['status'],$response['message']);
         }
        }
     }

     public function check(){
          $response = $this->paynow->check();
           if($response['status']=='INCOMPLETE'){
                return redirect()->route('payment')->with('successMessage',$response['message']);
           }elseif (strtoupper($response['status'])=='ERROR') {
               return redirect()->route('payment')->with('errorMessage',$response['message']);
           }else{
               return redirect()->route('dashboard')->with('successMessage',$response['message']); 
           }
     }
}

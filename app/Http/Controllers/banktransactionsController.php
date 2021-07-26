<?php

namespace App\Http\Controllers;

use App\Interfaces\banktransactionsInterface;
use Illuminate\Http\Request;

class banktransactionsController extends Controller
{
     private $bank;

     public function __construct(banktransactionsInterface $bank)
     {
       $this->bank = $bank;   
     }

     public function index(Request $request){
           return $request;
        //$response = $this->bank->receive($request);
        // return response()->json(['response'=>['status'=>$response['status'],'description'=>$response['description']]],$response['code']);
    
     }

     public function store(Request $request){
         
         $response = $this->bank->receive($request);
         return response()->json(['response'=>['status'=>$response['status'],'description'=>$response['description']]],$response['code']);
     }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\verificationRepository;
use Inertia\Inertia;
class verificationController extends Controller
{
    private $verification;

    public function __construct(verificationRepository $verification){
    $this->verification = $verification;
    }
  
    public function verify(Request $request)
    {
         $request->validate(['type'=>'required','code'=>'required']);
       $type = $request->type;
         $response = $this->verification->verify($request);
         if($response['status']==='successMessage'){
            if($request->type =='REGISTRATION'){
                 return Inertia::render('verifications/registration',['data'=>$response['data']])->with($response['status'],$response['message']);
                 
            }else{
                return Inertia::render('verifications/tenderfee',['data'=>$response['data'],'type'=>$type])->with($response['status'],$response['message']);
              
            }
         }else{
             return redirect()->back()->with($response['status'],$response['message']);
         }
    }

   
}

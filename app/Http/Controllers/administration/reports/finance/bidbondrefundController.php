<?php

namespace App\Http\Controllers\administration\reports\finance;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\bidbondrevenueRepository;
use Illuminate\Http\Request;
use PDF;

class bidbondrefundController extends Controller
{
    private $bidbond;

    public function __construct(bidbondrevenueRepository $bidbond)
    {
        $this->bidbond = $bidbond;

        $this->middleware("auth:admin");
    }

    public function store(Request $request){      
        $request->validate(['bank'=>'required','accountnumber'=>'required','requestletter'=>'required','name'=>'required']);

        return $this->bidbond->requestRefund($request);
    }

    public function show($id){
      return $this->bidbond->approveRefund($id);
    }

    public function edit($id){
     $bid = $this->bidbond->getBid($id);
     
     if(!is_null($bid)){
        
        return view('authorizationletter',['bid'=>$bid]);
    
      
     }
     else{
         return redirect()->back()->with('statusError','Refund request not found');
     }  
    }

    public function update(Request $request,$id){
        $request->validate(['referencenumber'=>'required']);
        return $this->bidbond->updateRefund($request,$id);
    }

}

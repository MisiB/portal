<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Models\mybidbonds;
use Illuminate\Http\Request;
use PDF;
class downloadbidbondController extends Controller
{
    public function show($id) 
    {
        $bid = mybidbonds::whereuuid($id)->first();
        $company = $bid->company_id;
        $bidbond = mybidbonds::with(['company','entity','invoice'=>function($query)use($company){
            $query->where('status','PAID');
            $query->where('company_id','=',$company);
            $query->where('type','REFUNDABLE');
        }])->whereuuid($id)->first();
        $pdf = PDF::loadView('bidbond',['bidbond'=>$bidbond]);
    
        return $pdf->download($bidbond->uuid.'.pdf');
    }
   
}

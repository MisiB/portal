<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Models\myadministrationfees;
use Illuminate\Http\Request;
use PDF;
class downloadadminfeesController extends Controller
{
    
    public function show($id)
    {
        $admin = myadministrationfees::with(['company','currency'])->whereuuid($id)->first();
        $pdf = PDF::loadView('adminreceipt',['admin'=>$admin]); 
        return $pdf->download($admin->uuid.'.pdf');
    }

    
}

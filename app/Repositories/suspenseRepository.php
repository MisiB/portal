<?php

namespace App\Repositories;

use App\Interfaces\suspenseInterface;
use App\Models\suspense;
use App\Helpers\generalHelper;
use App\Models\statement;

class suspenseRepository implements suspenseInterface{

 
    public function getReport()
    {
        
    }

    public function getReportByid($company)
    {
        
    }

    public function captureRecord(array $args)
    {
        suspense::firstOrCreate(['banktransaction_id'=>$args['banktransaction_id']],$args);
    }

    public function captureMobile(array $args)
    {
        suspense::firstOrCreate(['banktransaction_id'=>$args['banktransaction_id'],'source'=>$args['source']],$args);
    }

    public function getBalance($company,$accountnumber)
    {
        $suspense = suspense::with('suspenseReceipts')->wherecompany_id($company->id)->whereaccountnumber($accountnumber)->get();
         $total_deposited =  count($suspense)>0 ? $suspense->sum('amount') : 0;
         //$total_deposited =0;
         $total_receipted=0;

         if(count($suspense)>0)
         {
            foreach ($suspense as $key => $value) {
                // $total_deposited =  $total_deposited + number_format(preg_replace('/[^A-Za-z0-9\-]/', '',$value->amount);
                 $receipted =  count($value->suspenseReceipts)>0 ? $value->suspenseReceipts->sum('amount') : 0;
                 if($value->amount == $receipted){

                     $value->status ='UTILIZED';
                     $value->save();
                 }
                 $total_receipted = $total_receipted + $receipted;
            }
         }

         return $total_deposited -$total_receipted;
    
    }

    public function getSuspense($company,$accountnumber){
        return suspense::with('suspenseReceipts')->wherecompany_id($company->id)->whereaccountnumber($accountnumber)->wherestatus('PENDING')->get();
    }
}
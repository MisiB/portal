<?php

namespace App\Repositories;

use App\Interfaces\statementInterface;
use App\Models\statement;
use Illuminate\Support\Facades\Log;

class statementRepository implements statementInterface{
    public function getStatement($company)
    {
      return statement::wherecompany_id($company->id)->get();  
    }

    public function getBalance($company, $type,$currency)
    {
          $statement = statement::wherecompany_id($company->id)->wheretype($type)->wherecurrency($currency)->get();
          if(count($statement)>0){
           $debit = $statement->where('flag','DR');
           $credit = $statement->where('flag','CR');
            
           $total_debit = count($debit) ? $debit->sum('amount') : 0;
           $total_credit = count($credit) ? $credit->sum('amount') : 0;
            Log::info($total_debit);
            Log::info($total_credit);
           $balance =  $total_credit-$total_debit;
           return  $balance < 0 ? 0 : $balance;


          }
          return 0;
    }
}
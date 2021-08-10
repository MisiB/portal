<?php
namespace App\Repositories\administrator;

use App\Models\suspense;

class suspenseRepository{

    public function get_positive_balances(){
      $data = suspense::with('suspenseReceipts','company')->wherestatus('PENDING')->get();

       $summary = [];
       if(count($data)>0){
         $grouped = $data->groupBy('accountnumber');
         foreach ($grouped as $key => $value) {
                 $totalbalance = 0 ;
                foreach ($value as $ky => $val) {
                 $deposit = $val->amount;
                 $receipted = count($val->suspenseReceipts)>0 ? $val->suspenseReceipts->sum("amount") :0;
                 $balance = $deposit-$receipted;
                 $totalbalance = $totalbalance + $balance;
                }
              $summary[]=array('accountnumber' =>$key,"total"=>$totalbalance);
         }
       }

       return array("summary"=>$summary,"data"=>$data);

    }

    public function get_by_account_user($user_id){

    }

    public function get_suspnse_entry($id){

        return suspense::whereid($id)->first();
    }

    public function  movefunds($accountnumber)
    {
        
    }

    public function getBalance($id,$accountnumber)
    {
        $suspense = suspense::with('suspenseReceipts')->wherecompany_id($id)->whereaccountnumber($accountnumber)->get();
         $total_deposited =  count($suspense)>0 ? $suspense->sum('amount') : 0;

         $total_receipted=0;

         if(count($suspense)>0)
         {
            foreach ($suspense as $key => $value) {
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
}
<?php

namespace App\Repositories\administrator;

use App\Models\budget;

class budgetRepository{

     public function getList(){
        $plans = budget::with('entity')->wherestatus('PUBLISHED')->get();
        $grouped =  $plans->groupBy('year');

        $array = array();

        if(count($grouped)>0){
            foreach ($grouped as $key => $value) {
                $array[]= array('year'=>$key,'upload'=>count($value));
            }
        }
        return $array;
     }

     public function showList($year){
        return budget::with('entity')->where(['year'=>$year])->get();
    }

   
}
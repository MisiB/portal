<?php
namespace App\Repositories\administrator;

use App\Models\procurementplans;
use Illuminate\Support\Facades\Storage;

class planRepository {


    public function getList(){
        $plans = procurementplans::with('entity')->wherestatus('PUBLISHED')->get();
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
        return procurementplans::with('entity')->where(['year'=>$year])->get();
    }

   
}
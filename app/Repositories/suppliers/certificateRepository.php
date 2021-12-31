<?php 
namespace App\Repositories\suppliers;

use App\Interfaces\suppliers\certificateInterface;
use App\Models\suppliers;
use Carbon\Carbon;

class certificateRepository implements certificateInterface{
    public function getCertificate($company, $uuid)
    {
        $supplier = suppliers::with('company','category')
                             ->whereuuid($uuid)
                             ->wherecompany_id($company->id)
                             ->wherestatus('APPROVED')                        
                             ->first();
        if(!is_null($supplier) && $supplier->expire_year == Carbon::now()->year){
          if(!is_null($supplier)){
              $supplier->printed = $supplier->printed+1;
              $supplier->save();
          }
          return ["supplier"=>$supplier,"message"=>"","status"=>"success"];
        }else{
            return ["supplier"=>$supplier,"message"=>"Cerificate will be accessible from 1 January ".$supplier->expire_year,"status"=>"error"];  
        }
      
    }
}
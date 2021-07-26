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
                             ->whereexpire_year(Carbon::now()->year)
                             ->first();
          if(!is_null($supplier)){
              $supplier->printed = $supplier->printed+1;
              $supplier->save();
          }
       return $supplier;
    }
}
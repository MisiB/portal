<?php
namespace App\Repositories\suppliers;
use App\Models\category;
use App\Models\suppliers;
use Carbon\Carbon;
class activesuppliersRepository{

    public function getList(){

         $categories = category::get();

         $array=[];

         if(count($categories)>0){

            foreach ($categories as $key => $value) {
                $array[]= array("id"=>$value->id,"code"=>$value->code,"name"=>$value->name);
            }
         }
         return $array;
    }

    public function showlist($id){
      $suppliers = suppliers::with('company.contacts')->wherecategory_id($id)->whereexpire_year(Carbon::now()->year)->wherestatus('APPROVED')->get();
      $array=[];

      if(count($suppliers)>0)
      {
           foreach ($suppliers as $key => $value) {
               if(!is_null($value->company))
               {
               $name = !is_null($value->company) ? $value->company->name : "NULL";
               $city = !is_null($value->company) ? $value->company->city : "NULL";
               $country = !is_null($value->company) ? $value->company->country : "NULL";
               $address = !is_null($value->company->contacts) ?$value->company->contacts->address : "NULL";
               $emails = !is_null($value->company->contacts) ?$value->company->contacts->emails : "NULL";
               $phones = !is_null($value->company->contacts) ?$value->company->contacts->phonenumbers: "NULL";

              $array[] = array("name"=>$name,"city"=>$city,"country"=>$country,"address"=>$address,"emails"=>$emails,"phones"=>$phones);   
            }
           }
      }

      return $array;


    }

}
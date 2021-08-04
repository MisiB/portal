<?php

namespace App\Repositories\users;

use App\Helpers\generalEntityHelper;
use App\Models\procurementnotices;
use App\Models\suppliers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class mytendersRepository{

    private $helper;

    public function __construct(generalEntityHelper $helper)
    {
      $this->helper = $helper;  
    }

     public function getList(){
         $tenders = procurementnotices::with('procurementtype','createdby','publishedby','products.categories','classification')
                                      ->wherestatus('PUBLISHED')
                                      ->whereDate('close_date','>=',Carbon::now())
                                      ->get();
          $suppliers = suppliers::wherecompany_id(Auth::user()->company->id)->get();
          $categoryArray = [];
          if(count($suppliers)>0)
          {
          $grouped = $suppliers->groupBy('category_id');
          
             foreach ($grouped as $key => $value) {
                 $categoryArray[] = $key;
             }
          }
             $tendersArray=[];
          if(count($tenders)>0){
             foreach ($tenders as $key => $value) {
                $recommended = "N";
                 foreach ($value->products as $ky => $val) {
                      foreach ($val->categories as $k => $vl) 
                      {
                        if(count($categoryArray)>0){
                            for ($i=0; $i < count($categoryArray) ; $i++) { 
                                if($vl->category_id == $categoryArray[$i]){
                                  $recommended = 'Y';
                                }
                            }
                        }
                      }
                 }

                 $tendersArray[]=array('id'=>$value->id,'title'=>$value->title,'uuid'=>$value->uuid,'type'=>$value->procurementtype->name,'close_date'=>$value->close_date,'recommended'=>$recommended);
             }
          }

          return $tendersArray;

     }

     public function findbynumber($tendernumber){
      return procurementnotices::with('procurementtype','currency','createdby','publishedby','products.categories.category','classification')->wheretendernumber($tendernumber)->first();
     }

     public function getPublishedList(){
        $tenders = procurementnotices::with('procurementtype','createdby','publishedby','products.categories','classification')
        ->wherestatus('PUBLISHED')
        ->whereDate('close_date','>=',Carbon::now())
        ->get();
            $tendersArray=[];
            if(count($tenders)>0)
            {
            foreach ($tenders as $key => $value)
            {
            $tendersArray[]=array('id'=>$value->id,'title'=>$value,'type'=>$value->procurementtype->name,'close_date'=>$value->close_date,'recommened'=>$recommended);
            }
            }

            return $tendersArray; 
     }

     public function show($id){
        $notice =  procurementnotices::with('procurementtype','entity','currency','createdby','publishedby','products.categories.category','classification')->whereuuid($id)->first();  
        $spocfee=0;
        $establishmentfee =0;
        if($notice->procurementtype_id=='2'){
            $spocfee = $this->helper->calculate_spoc($notice->id);
            $establishmentfee = $this->helper->calculate_establishmentfee($notice->id);
        }

        return array('notice'=>$notice,'spoc'=>$spocfee,'establishment'=>$establishmentfee);
     }
}
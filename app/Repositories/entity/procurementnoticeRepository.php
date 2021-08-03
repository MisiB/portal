<?php

namespace App\Repositories\entity;

use App\Helpers\generalEntityHelper;
use App\Models\procurementnotices;
use App\Models\procurementproductcategory;
use App\Models\procurementproducts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class procurementnoticeRepository{
   private $helper;
   public function __construct(generalEntityHelper $helper)
   {
     $this->helper = $helper;  
   }
    public function getList(){
          $entity = $this->helper->getEntity();
           $notices =  procurementnotices::whereentity_id($entity->id)->get();
           $array = [];

           if(count($notices)>0){
               foreach ($notices as $key => $value) {
                   $active = 'N';
                   if(Carbon::parse($value->close_date)->gte(Carbon::now())){
                   $active = 'Y';
                   }
                  $array[] = array("uuid"=>$value->uuid,'title'=>$value->title,'close_date'=>$value->close_date,'close_time'=>$value->close_time,'status'=>$value->status,'active'=>$active,'filename'=>$value->filename);
               }
           }

           return $array;
    }

    public function getActivelist(){
        $notices =  procurementnotices::get();
        $array = [];

        if(count($notices)>0){
            foreach ($notices as $key => $value) {
                $active = 'N';
                if(Carbon::parse($value->close_date)->gte(Carbon::now())){
                $active = 'Y';
                }
                if($active=='Y')
                {
               $array[] = array("uuid"=>$value->uuid,'title'=>$value->title,'close_date'=>$value->close_date,'close_time'=>$value->close_time,'status'=>$value->status,'active'=>$active);
                }
            }
        }

        return $array;    
    }

    public function show($id){
        $notice =  procurementnotices::with('procurementtype','currency','createdby','publishedby','products.categories.category','classification')->whereuuid($id)->first();  
        $spocfee=0;
        $establishmentfee =0;
        if($notice->procurementtype_id=='2'){
            $spocfee = $this->helper->calculate_spoc($notice->id);
            $establishmentfee = $this->helper->calculate_establishmentfee($notice->id);
        }

        return array('notice'=>$notice,'spoc'=>$spocfee,'establishment'=>$establishmentfee);
    }

    public function create(Request $request){

        $entity = $this->helper->getEntity();
        $tendernumber = $this->helper->tendernumber($entity->slug,$request->noticetype);
     /*     if($request->procurementtype=='2'){
             if($request->bidsecurity !=''){
                $response = $this->helper->calculate_cap($request->bidsecurity,$request->bidvalue);
                 if($response['status']=='errorMessage'){
                     return $response;
                 }
                
             }
         } */

         $path = $request->file('filename')->store('notices','my_files');
            $array=[
                'entity_id'=>$entity->id,
                'uuid'=>Str::uuid(),
                'title'=>$request->title,
                'tendernumber'=>$tendernumber,
                'description'=>$request->description,
                'close_date'=>$request->close_date,
                'close_time'=>$request->close_time,
                'validityperiod'=>$request->validityperiod,
                'bidsecurity'=>$request->bidsecurity,
                'currency_id'=>$request->currency,
                'procurementtype_id'=>$request->procurementtype,
                'created_by'=>Auth::user()->id,
                'filename'=>$path
                /* ,
                'bidvalue'=>$request->bidvalue,
               
                'site_visit_date'=>$request->site_visit_date,
                'site_visit_time'=>$request->site_visit_time,
                'site_visit_location'=>$request->sitevisitlocation, */
               
                /* 'instructions'=>$request->instructions,
                'noticetype'=>$request->noticetype, */
              
               /*  'limit'=>$request->limit,
                
                'classification_id'=>$request->classification, */
               
            ];

         $notice = procurementnotices::create($array);
        
   /*      for ($i=0; $i < count($productarray) ; $i++) { 
             Log::info($productarray[$i]['categories']);
             $product = procurementproducts::create(['procurementnotice_id'=>$notice->id,'name'=>$productarray[$i]['name'],'quantity'=>$productarray[$i]['quantity']]);
             for ($j=0; $j < count($productarray[$i]['categories']) ; $j++)
              { 
                procurementproductcategory::create(['procurementnotice_id'=>$notice->id,'procurementproduct_id'=>$product->id,'category_id'=>$productarray[$i]['categories'][$j]['id']]);
          
             }
        }
       */
            
          

          return array('status'=>'successMessage','message'=>'Procurement notice successfully created');
        
    }

    public function updateNotice(Request $request,$id){
     $notice = procurementnotices::whereuuid($id)->first();
     $notice->title=$request->title;
     $notice->description=$request->description;
     $notice->close_date=$request->closedate;
     $notice->currency_id=$request->currency;
     $notice->bidsecurity=$request->bidsecurity;
     $notice->procurementtype_id=$request->procurementtype;
     $notice->validityperiod = $request->validityperiod;
     $notice->save();
    // ;
    // $notice->bidvalue=$request->bidvalue;
   //  y;
    // $notice->site_visit_date=$request->sitevisitdate;
     //$notice->site_visit_location=$request->sitevisitlocation;
    
    // $notice->instructions=$request->instructions;
    // $notice->noticetype=$request->noticetyp;
   //  $notice->limit=$request->limit;
    // ;
    
    /*  procurementproducts::whereprocurementnotice_id($notice->id)->delete();
     procurementproductcategory::whereprocurementnotice_id($notice->id)->delete();
     foreach ($request->products as $key => $value) {
        $product = procurementproducts::create(['procurementnotice_id'=>$notice->id,'name'=>$value->name,'quantity'=>$value->quantity]);
          foreach ($value->categories as $ky => $val) {
               procurementproductcategory::create(['procurementnotice_id'=>$notice->id,'procurementproduct_id'=>$product->id,'category_id'=>$val->category]);
          }
     } */
     return array('status'=>'successMessage','message'=>'Procurement notice successfully updated');
    }

    public function delete($id){
        $notice = procurementnotices::whereuuid($id)->first();
        $notice->status ='CANCELLED';
        $notice->save();
    }

    public function published($id){
        $notice = procurementnotices::whereuuid($id)->first();
        $notice->status ='PUBLISHED';
        $notice->published_by = Auth::user()->id;
        $notice->save(); 
        return array('status'=>'successMessage','message'=>'Procurement notice successfully published'); 
    }

}
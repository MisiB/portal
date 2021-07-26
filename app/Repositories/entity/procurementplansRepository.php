<?php
namespace App\Repositories\entity;
use App\Helpers\generalEntityHelper;
use App\Models\procurementplans;
use Carbon\Carbon;
use Illuminate\Http\Request;

class procurementplansRepository{

    private $helper;

    public function __construct(generalEntityHelper $helper)
    {
      $this->helper = $helper;   
    }
    public function getList(){
         
        $entity = $this->helper->getEntity();
         return  procurementplans::whereentity_id($entity->id)->get();
    }

    public function create(Request $request){
         $path = $request->file('filename')->store('plans','my_files');
         $entity = $this->helper->getEntity();
         if($request->id==''){
             procurementplans::create(['entity_id'=>$entity->id,'year'=>Carbon::now()->year,'path'=>$path,'status'=>'PUBLISHED']);
         }else{

            $plans = procurementplans::whereid($request->id)->first();
            $plans->path = $path;
            $path->save();
         }

         return array('status'=>'successMessage','message'=>'Procurement Plans successfully uploaded');
    }
}
<?php
namespace App\Repositories\entity;

use App\Helpers\generalEntityHelper;
use App\Models\budget;
use Carbon\Carbon;
use Illuminate\Http\Request;

class procurementbudgetRepository{
    private $helper;

    public function __construct(generalEntityHelper $helper)
    {
      $this->helper = $helper;   
    }
    public function getList(){
         
        $entity = $this->helper->getEntity();
         return  budget::whereentity_id($entity->id)->get();
    }

    public function create(Request $request){
         $path = $request->file('filename')->store('plans','my_files');
         $entity = $this->helper->getEntity();
         if($request->id==''){
             budget::create(['entity_id'=>$entity->id,'year'=>Carbon::now()->year,'path'=>$path,'status'=>'PUBLISHED']);
         }else{

            $plans = budget::whereid($request->id)->first();
            $plans->path = $path;
            $path->save();
         }

         return array('status'=>'successMessage','message'=>'Procurement Plans successfully uploaded');
    }
}

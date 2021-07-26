<?php
namespace App\Repositories\entity;

use App\Helpers\generalEntityHelper;
use App\Http\Controllers\administration\returnsController;
use App\Models\returns;
use App\Models\returns_upload;
use Carbon\Carbon;
use Illuminate\Http\Request;

class procurementreturnRepository{

   private $helper;

   public function __construct(generalEntityHelper $helper)
   {
       $this->helper = $helper;

   }

    public function getList(){
       $entity = $this->helper->getEntity();
       $returns = returns::with(['uploads'=>function($query)use($entity){
           $query->where('entity_id','=',$entity->id);
       }])->where(['year'=>Carbon::now()->year])->get();

       return $returns;
    }

    public function create(Request $request){
         $path =  $request->file('filename')->store('returns','my_files');
         $entity = $this->helper->getEntity();
         if($request->id=='')
         {
         returns_upload::create(['return_id'=>$request->return_id,'entity_id'=>$entity->id,'path'=>$path]);
         }else{
             $upload =  returns_upload::whereid($request->id)->first();
             $upload->path = $path;
             $upload->save();
         }
         return array('status'=>'successMessage','message'=>'Procurement return successfully uploaded');

    }
}
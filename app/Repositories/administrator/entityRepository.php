<?php
namespace App\Repositories\administrator;

use App\Models\entity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class entityRepository{

    public function getList(Request $request){
        return entity::when($request->term,function($query,$term){
            $query->where('name','LIKE','%'.$term.'%');
        })->with('users.role','procurementclass')->get();
    }
   
    public function getEntities(){
        return entity::orderby('name','asc')->get();
    }
    public function create(Request $request){
        $entity = "";
        $slug = $request->slug;
        if($request->id==''){
           $entity=  entity::create(['name'=>$request->name,'slug'=>$slug,'city'=>$request->city,'province'=>$request->province,'district'=>$request->district,'sector'=>$request->sector]);
        }else{
            $entity = entity::whereid($request->id)->first();
            $entity->name = $request->name;
            $entity->slug = $slug;
            $entity->city = $request->city;
            $entity->sector = $request->sector;
            $entity->province = $request->province;
            $entity->district = $request->district;            
            $entity->save();
        }

        $entity->procurementclass()->detach();
        $entity->procurementclass()->attach($request->procurementclass);

        return array('status'=>'successMessage','message'=>'Entity successfully Processed');
    }
    function initials($words) {
      
        $str = str_ireplace('OF','',strtoupper($words));
        Log::info($str);
        $ret = '';
        foreach (explode('  ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }

}
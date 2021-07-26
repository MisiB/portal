<?php

namespace App\Repositories\administrator;

use App\Models\modules;
use App\Models\submodules;
use Illuminate\Http\Request;

class submoduleRepository{

    public function getList($uuid){
        return modules::with('submodules.permissions')->whereuuid($uuid)->first();
    }

    public function create(Request $request){
     
         if($request->id=='')
         {
         $submodule=submodules::create([
                          'module_id'=>$request->module_id,
                          'icon'=>$request->icon,
                          'url'=>$request->url,
                          'name'=>$request->name
                          ]);
         }else{
             $submodule= submodules::whereid($request->id)->first();
             if(!is_null($submodule)){
                 $submodule->icon = $request->icon;
                 $submodule->url = $request->url;
                 $submodule->name = $request->name;
                 $submodule->save();
             }
         }

         
         return array('status'=>'successMessage','message'=>'Submodule successfully created');
       

    }

    public function delete($id){
        $submodule = submodules::whereid($id)->first();
        if(!is_null($submodule))
        {
            $submodule->delete();    

            return array('status'=>'successMessage','message'=>'Submodule successfully deleted');
        }else{
            return array('status'=>'errorMessage','message'=>'Submodule not found'); 
        }
    }
}
<?php
namespace App\Repositories\administrator;

use App\Models\modules;
use App\Models\submodules;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class moduleRepository{
    public function getList(){
        return modules::with(['roles','submodules.roles','submodules.permissions.roles'])->get();
    }

    public function getAssigned($id){
        $modules  = modules::with(['roles'=>function($query)use($id){
            $query->wherePivot('roles_id',$id);
        },'submodules.roles'=>function($query)use($id){
            $query->wherePivot('roles_id',$id);
        },'submodules.permissions.roles'=>function($query)use($id){
         $query->wherePivot('roles_id',$id);
        }])->get();

        return $modules;
    }

    public function create(Request $request){
        if($request->id=='')
        {
        $uuid = Str::uuid();
        modules::create(['icon'=>$request->icon,'uuid'=>$uuid,'link'=>'#','name'=>$request->name]);
        return array('status'=>'successMessage','message'=>'Module Successfully Created');
        }else{
            $module = modules::whereid($request->id)->first();
            $module->icon = $request->icon;
            $module->name = $request->name;
            $module->save();
            return array('status'=>'successMessage','message'=>'Module Successfully Updated');
        }
    }

    public function delete($uuid){
      $module = modules::whereuuid($uuid)->first();
       submodules::wheremodule_id($module->id)->delete();
       $module->roles()->detach();
       $module->delete();
       return array('status'=>'successMessage','message'=>'Module Successfully deleted');

    }
}
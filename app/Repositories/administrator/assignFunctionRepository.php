<?php
namespace App\Repositories\administrator;
use App\Models\modules;
use App\Models\permissions;
use App\Models\roles;
use App\Models\submodules;

class assignFunctionRepository{
    public function assign($id,$role,$action,$table){
        if($table=="modules")
         {
        $role = roles::whereid($role)->first();
        $module = modules::whereid($id)->first();
        if($action=='assign'){             
            $role->modules()->attach($module); 
           return array('status'=>'successMessage','message'=>'Module Successfully Assigned');
        }
        else{
            $role->modules()->detach($module);  
            return array('status'=>'successMessage','message'=>'Module Successfully unassigned'); 
        }
        }
        if($table=="submodules")
        {
       $role = roles::whereid($role)->first();
       $module = submodules::whereid($id)->first();
       if($action=='assign'){             
           $role->submodules()->attach($module); 
          return array('status'=>'successMessage','message'=>'Module Successfully Assigned');
       }
       else{
           $role->submodules()->detach($module);  
           return array('status'=>'successMessage','message'=>'Module Successfully unassigned'); 
       }
       }

       if($table=="permissions")
       {
      $role = roles::whereid($role)->first();
      $module = permissions::whereid($id)->first();
      if($action=='assign'){             
          $role->permissions()->attach($module); 
         return array('status'=>'successMessage','message'=>'Module Successfully Assigned');
      }
      else{
          $role->permissions()->detach($module);  
          return array('status'=>'successMessage','message'=>'Module Successfully unassigned'); 
      }
      }
    }
}
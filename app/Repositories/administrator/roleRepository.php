<?php

namespace App\Repositories\administrator;

use App\Interfaces\administrator\roleInterface;
use Illuminate\Http\Request;
use App\Models\roles;
use Illuminate\Support\Facades\Log;

class roleRepository implements roleInterface{
    public function getList()
    {
         return roles::with(['modules.roles','modules.submodules.roles','modules.submodules.permissions.roles'])->get();
    }

    public function getRoleBylevel($level){
        return roles::wherelevel($level)->get();
    }
   

    public function add(Request $request)
    {
       roles::create(['name'=>$request->name,'level'=>$request->level]);
       return array('status'=>'successMessage','message'=>'Role successfully created');  
    }

    public function update(Request $request, $id)
    {
        $role = roles::whereid($id)->first();
        $role->name = $request->name;
        $role->save();
        return array('status'=>'successMessage','message'=>'Role successfully created');  
    }

    public function delete($id)
    {
        $role = roles::whereid($id)->first();
        $role->modules()->detach();
        $role->administrators()->detach();
        $role->delete();

        return array('status'=>'successMessage','message'=>'Role successfully Deleted'); 
    }
}
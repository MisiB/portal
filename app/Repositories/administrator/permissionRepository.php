<?php

namespace App\Repositories\administrator;

use App\Models\permissions;
use Illuminate\Http\Request;

class permissionRepository{

    public function getList($id){
        return  permissions::wheresubmodule_id($id)->get();
    }

    public function create(Request $request){
        if($request->id==''){
           permissions::create(['submodule_id'=>$request->submodule_id,'name'=>$request->name,'value'=>$request->value]);
        }else{
            $permission = permissions::whereid($request->id)->first();
            $permission->name = $request->name;
            $permission->value = $request->value;
            $permission->save();
        }

        return array('status'=>'successMessage','message'=>'Permission Processed Successfully');
    }


    public function delete($id){
        $permission = permissions::whereid($id)->first();
        $permission->delete();
        return array('status'=>'successMessage','message'=>'Permission Deleted Successfully');

    }
}
<?php

namespace App\Repositories\administrator;

use App\Models\category;
use Illuminate\Http\Request;

class categoryRepository{

    public function getList(Request $request,$status){
        return category::when($request->term,function($query,$term){
            $query->where('code','LIKE','%'.$term.'%');
            $query->orWhere('name','LIKE','%'.$term.'%');
        })->with('section')->wherestatus($status)->orderBy('section_id','desc')->get();
    }

    public function create(Request $request){
        if($request->id==''){
            category::create(['name'=>$request->name,'code'=>$request->code,'section_id'=>$request->section]);
        }else{
            $type = category::whereid($request->id)->first();
            $type->name = $request->name;
            $type->code = $request->code;
            $type->section_id = $request->section;
            $type->save();
        }

        return array('status'=>'successMessage','message'=>'Supplier Category Successfully Processed');
    }
    public function delete($id){
        $type = category::whereid($id)->first();
        $type->status ="DELETED";
        $type->save();
        return array('status'=>'successMessage','message'=>'Category Section Successfully Deleted');
    }
}
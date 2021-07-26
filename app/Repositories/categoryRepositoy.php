<?php


namespace App\Repositories;


use App\Http\Requests\categoryRequest;
use App\Models\category;

class categoryRepositoy implements \App\Interfaces\categoryInterface
{

    public function getList($status)
    {
        $category=[];
       if(!is_null($status)){
           $category =  category::with('section')->wherestatus($status)->get();
       }else{
           $category = category::with('section')->get();
       }

       return $category;
    }

    public function capture(categoryRequest $request)
    {
        $category=null;
      if($request->id ==''){
        $category=  category::create(['section_id'=>$request->section,'code'=>$request->code,'name'=>$request->name]);
      }else{
          $category = category::whereid($request->id)->first();
          $category->section_id = $request->section;
          $category->code = $request->code;
          $category->name = $request->name;
          $category->save();
      }

      return $category;
    }

    public function delete($id,$status)
    {
        $category = category::whereid($id)->first();
        $category->status =$status;
        $category->save();
        return $category;
    }
}

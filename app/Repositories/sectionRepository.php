<?php


namespace App\Repositories;


use App\Http\Requests\sectionRequest;
use App\Models\sections;

class sectionRepository implements \App\Interfaces\sectionInterface
{

    public function getList($status)
    {
        $sections =[];
        if(!is_null($status)){
            $sections = sections::wherestatus($status)->get();
        }else{
            $sections = sections::get();
        }

        return $sections;
    }

    public function capture(sectionRequest $request)
    {
        $section = null;
         if($request->id ==''){
            $section = sections::create($request->only('name'));
         }else{
             $section = sections::whereid($request->id)->first();
             $section->name = $request->name;
             $section->save();

         }

         return $section;
    }

    public function delete($id, $status)
    {
        $section = sections::whereid($id)->first();
        $section->status = $status;
        $section->save();
        return $section;
    }
}

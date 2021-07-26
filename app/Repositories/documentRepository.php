<?php


namespace App\Repositories;


use App\Http\Requests\documentRequest;
use App\Models\documents;

class documentRepository implements \App\Interfaces\documensInterface
{

    public function getList($accounttype)
    {
         return documents::whereaccounttype_id($accounttype)->get();
    }

    public function add(documentRequest $request)
    {
        if($request->id =='')
        {
            $document =  documents::create(['accounttype_id'=>$request->accounttype,'name'=>$request->name]);
            return $document;
        }else{
            $document = documents::whereid($request->id)->first();
            $document->accounttype_id = $request->accounttype;
            $document->name = $request->name;
            $document->save();
            return $document;
        }
    }

    public function delete($id)
    {
       $document = documents::whereid($id)->first();
       $document->status = 'CANCELLED';
       $document->save();
       return $document;
    }
}

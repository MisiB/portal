<?php

namespace App\Http\Controllers;

use App\Models\company_documents;
use App\Models\rtgs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class downloadmanagerController extends Controller
{
  
    public function download($id,$type)
    {
        

        if($type=="documents"){
            $documents = company_documents::whereid($id)->first();
            if(!is_null($documents)){
                
       try {
         return Storage::disk('sftp')->download($documents->path);
       } catch (\Throwable $th) {
           return Storage::disk('my_files')->download($documents->path);
       
       }

              
            }else{
            return "File not found";
            }
        }else{
            $documents = rtgs::whereid($id)->first();
            if(!is_null($documents)){
                  try {
         return Storage::disk('sftp')->download($documents->filename);
       } catch (\Throwable $th) {
           return Storage::disk('my_files')->download($documents->filename);
       
       }

           
            }else{
            return "File not found";
            }
        }
       
         
    }


}

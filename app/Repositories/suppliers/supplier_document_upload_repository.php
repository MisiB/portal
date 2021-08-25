<?php


namespace App\Repositories\suppliers;


use App\Http\Requests\uploadRequest;
use App\Models\documents;
use App\Models\company_documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class supplier_document_upload_repository implements \App\Interfaces\suppliers\supplier_document_upload_Interface
{

    public function getList($company)
    {
        $documents = documents::whereaccounttype_id($company->accounttype_id)
                              ->wherelocality($company->locality)
                              ->with(['company'=>function($query)use($company){
                                     $query->wherecompany_id($company->id);
                               }])
                                ->get()
                            ->map(function($document){
                            return[
                                "id"=>$document->id,
                                "company_document_id"=>!is_null($document->company) ? $document->company->id : '',
                                "name"=>$document->name,
                                "uploaded"=> !is_null($document->company) ? true : false,
                                "status"=> !is_null($document->company) ? $document->company->status : '',
                                "pages"=>$document->pages,
                                'company_document_id'=>!is_null($document->company) ? $document->company->id : ''
                            ];
                        });
        return $documents;
    }

    public function upload(Request $request, $company)
    {
        $pdftext = file_get_contents($request->file('filename'));
        $num = preg_match_all("/\/Page\W/", $pdftext, $matches);
        
        $document = documents::whereid($request->document)->first();
        if($document->pages <= $num)
        {
        $path =$request->file('filename')->store('documents','my_files'); 
        $document= company_documents::updateOrCreate(['document_id'=>$request->document,'company_id'=>$company->id],['document_id'=>$request->document,'company_id'=>$company->id,'path'=>$path]);
        return  array('status'=>'successMessage','message'=>'Successfully uploaded Document');
        }else{
            return array('status'=>'errorMessage','message'=>'Please uploaded atleast  '.$document->pages.' pages');
        }
    }


    public function update(Request $request){
        $pdftext = file_get_contents($request->file('filename'));
        $num = preg_match_all("/\/Page\W/", $pdftext, $matches);
        $company = Auth::user()->company;
        $document = documents::whereid($request->document_id)->first();
        if($document->pages <= $num)
        {
        $path =$request->file('filename')->store('documents','my_files'); 
        $document = company_documents::whereid($request->id)->first();
        if(!is_null($document))
        {
        $document->path = $path;
        $document->save();
        return $document;
        }else{
            $document= company_documents::updateOrCreate(['document_id'=>$request->document_id,'company_id'=>$company->id],['document_id'=>$request->document_id,'company_id'=>$company->id,'path'=>$path]);
            return $document;
        }
        }else{
            return array('status'=>'errorMessage','message'=>'Please uploaded atleast  '.$document->pages.' pages');
        }
    }

    public function checkDocument($company){
        $documents = documents::whereaccounttype_id($company->accounttype_id)
            ->wherelocality($company->locality)
            ->with(['company'=>function($query)use($company){
                $query->wherecompany_id($company->id);
            }])
            ->get();
        $totalDocuments = count($documents);
        $totaluploaded = 0;
        if($totalDocuments>0){
            foreach ($documents as $doc){
                if(!is_null($doc->company)){
                    $totaluploaded++;
                }
            }
        }

        if($totalDocuments==$totaluploaded){
            return true;
        }else{
            return false;
        }

    }
}

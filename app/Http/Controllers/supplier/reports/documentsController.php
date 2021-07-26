<?php

namespace App\Http\Controllers\supplier\reports;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\uploadRequest;
use App\Interfaces\suppliers\supplier_document_upload_Interface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class documentsController extends Controller
{
    private $HELPER;

    private $document;


    public function __construct(generalHelper $HELPER, supplier_document_upload_Interface $document)
    {
        $this->HELPER = $HELPER;
        $this->document = $document; 
    }

    public function index()
    {
      $company = $this->HELPER->get_company_name();
       $documents = $this->document->getList($company);
       return Inertia::render('Accounts/users/reports/documents',['documents'=>$documents]);
    }

    public function store(uploadRequest $request){
        $pdftext = file_get_contents($request->file('filename'));
        $num = preg_match_all("/\/Page\W/", $pdftext, $matches);

        if($num<$request->pages){
            return redirect()->back()->with('errorMessage','Please upload a document with atleast '.$request->pages.' pages');
        }else{
            $document = $this->document->update($request);
            return redirect()->back()->with('successMessage','Document Successfully Updated');
        }
    }
}

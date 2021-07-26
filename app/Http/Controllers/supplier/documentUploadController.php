<?php

namespace App\Http\Controllers\supplier;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\uploadRequest;
use App\Interfaces\suppliers\supplier_document_upload_Interface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class documentUploadController extends Controller
{
    private $DOCUMENT;
    private $HELPER;
    public  function __construct(supplier_document_upload_Interface $document,generalHelper $helper){
     $this->DOCUMENT = $document;
     $this->HELPER = $helper;
    }

    public function index()
    {
        $company = $this->HELPER->get_company_name(); 
          $documents = $this->DOCUMENT->getList($company);

        if($this->DOCUMENT->checkDocument($company)){
            return redirect()->route('Invoicing.index');
        }else {
            return Inertia::render('Accounts/users/registration/documents', ['documents' => $documents]);
        }
    }




    public function store(Request $request)
    {      
        $request->validate(['filename'=>'required|file|mimes:pdf|max:5000']);
        $company = $this->HELPER->get_company_name();
        $response = $this->DOCUMENT->upload($request,$company);
        if($this->DOCUMENT->checkDocument($company)){
             return redirect()->route('Invoicing.index')->with('successMessage','Required Company Documents Successfully Uploaded');
        }else{
            return redirect()->back()->with($response['status'],$response['message']);

        }


    }



}

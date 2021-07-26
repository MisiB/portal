<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Models\rtgs;
use App\Repositories\administrator\bankapiRepository;
use Illuminate\Http\Request;
use App\Repositories\administrator\rtgsRepository;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class rtgsController extends Controller
{
   
    private $rtgs;
    private $bankapi;

    public function __construct(rtgsRepository $rtgs,bankapiRepository $bankapi)
    {
        $this->rtgs = $rtgs;
        $this->bankapi = $bankapi;
    }
    public function index(Request $request)
    {
        $rtgs = $this->rtgs->getList('PENDING');
        $transactions=[];
        if($request->term)
        {        
        $transactions = $this->bankapi->getList($request);
        }
        return Inertia::render('Accounts/administrator/rtgs/index',compact('rtgs','transactions'));
    }

 
    public function store(Request $request)
    {
        $response = $this->bankapi->update($request->id,$request->rtgs);  
        if($response['status']=='successMessage'){
            $response =$this->rtgs->update($request->rtgs,$response['data']);
        }        
       return redirect()->back()->with($response['status'],$response['message']);
         
    }

    public function show($id){
         $rtgs = rtgs::whereid($id)->first();
         if(!is_null($rtgs))
         {
            return Storage::download($rtgs->path);
         }
    }

    
    public function destroy($id)
    {
        //
    }
}

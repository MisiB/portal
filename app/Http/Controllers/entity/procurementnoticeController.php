<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Interfaces\categoryInterface;
use App\Interfaces\currencyInterface;
use App\Repositories\administrator\classificationRepository;
use App\Repositories\administrator\procurementtypeRepository;
use App\Repositories\entity\procurementnoticeRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class procurementnoticeController extends Controller
{
    private $procurementnotice;
    private $currency;
    private $procurementtype;
    private $categories;
    private $classifications;
    public function __construct(procurementnoticeRepository $procurementnotice,currencyInterface $currency,procurementtypeRepository $procurementtype,categoryInterface $categories,classificationRepository $classifications)
    {
       $this->procurementnotice =$procurementnotice;  
       $this->currency = $currency;
       $this->procurementtype = $procurementtype;
       $this->categories = $categories;
       $this->classifications = $classifications;
    }
    public function index()
    {
        $notices = $this->procurementnotice->getList();
        return Inertia::render('Accounts/entity/notices/index',compact('notices'));
    }
  
    
    public function store(Request $request)
    {
      $request->validate(['title'=>'required','close_date'=>'required','close_time'=>'required','description'=>'required','instructions'=>'required','noticetype'=>'required','procurementtype'=>'required','bidvalue'=>'required','currency'=>'required','products'=>'required','classification'=>'required','filename'=>'required|file']);
       $response = $this->procurementnotice->create($request);
       if($response['status']=='successMessage')
       {
        return redirect()->route('procurementnotice.index')->with($response['status'],$response['message']);
       }else{
           return redirect()->back()->with($response['status'],$response['message']);
       }
     
    }

   
    public function show($id)
    {
        $response= $this->procurementnotice->show($id);
        $notice = $response['notice'];
        $spoc = $response['spoc'];
        $establishment = $response['establishment'];
        return Inertia::render('Accounts/entity/notices/show',compact('notice','spoc','establishment'));
    }

    public function edit($id){
        $response = $this->procurementnotice->published($id);
        return  redirect()->route('procurementnotice.index')->with($response['status'],$response['message']);
    }
    public function create(){
        
        $currency = $this->currency->getList('CREATED');
        $procurementtypes = $this->procurementtype->getList();
        $categories = $this->categories->getList('CREATED');
        $classifications = $this->classifications->getList('CREATED');
        return Inertia::render('Accounts/entity/notices/add',compact('currency','procurementtypes','categories','classifications')); 
    }

  
    public function update(Request $request, $id)
    {
      $response = $this->procurementnotice->updateNotice($request,$id);
      return redirect()->back()->with($response['status'],$response['message']);
    }


    public function destroy($id)
    {
        $response = $this->procurementnotice->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

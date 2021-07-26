<?php

namespace App\Http\Controllers;

use App\Repositories\users\mytendersRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class mytendersController extends Controller
{
    private $mytenders;

    public function __construct(mytendersRepository $mytenders)
    {
     $this->mytenders = $mytenders;
    }
    public function index()
    {
         $tenders = $this->mytenders->getList();
         return Inertia::render('Accounts/users/mytenders/dashboard',compact('tenders'));
    }

    public function store(Request $request){
        $request->validate(['tendernumber'=>'required']);
        $tender = $this->mytenders->findbynumber($request->tendernumber);
        if(!is_null($tender)){
            return redirect()->route('Mytenders.show',$tender->uuid);
        }else{
            return redirect()->route('TenderFees.create')->with(['errorMessage','We could not find any procurement notice with the specified tender number please manaul enter the tender  fees you wish to  pay']);
        }
    }
    public function show($id){
        $response = $this->mytenders->show($id);
        $notice = $response['notice'];
        $spoc = $response['spoc'];
        $establishment = $response['establishment'];
        return Inertia::render('Accounts/users/mytenders/show',compact('notice','spoc','establishment'));

    }

 
}

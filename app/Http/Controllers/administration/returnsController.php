<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\returnsRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class returnsController extends Controller
{
    private $returns;

    public function __construct(returnsRepository $returns)
    {
       $this->returns = $returns;  
    }
    public function index()
    {
     $returns = $this->returns->getList();
     return  Inertia::render('Accounts/administrator/returns/index',compact('returns'));
    }


    public function show($id)
    {
        $returns = $this->returns->showlist($id);
        return  Inertia::render('Accounts/administrator/returns/show',compact('returns'));
    }

  
    public function store(Request $request)
    {
       $request->validate(['name'=>'required','templateurl'=>'required|file','duedate'=>'required']);
       $response = $this->returns->create($request);
       return redirect()->back()->with($response['status'],$response['message']);
    }

    public function destroy($id){
        $response = $this->returns->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);   
    }

   
}

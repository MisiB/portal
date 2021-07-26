<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\sectionRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class sectionController extends Controller
{
    private  $sections;

    public function __construct(sectionRepository $sections)
    {
        $this->sections = $sections;
    }
    public function index()
    {
         $sections = $this->sections->getList('CREATED');
         return  Inertia::render('Accounts/administrator/sections/index',compact('sections'));
    }

    
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|unique:sections,id']);
        $response = $this->sections->create($request);
        return redirect()->back()->with($response['status'],$response['message']);
    }

    

   
    public function destroy($id)
    {
        $response = $this->sections->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

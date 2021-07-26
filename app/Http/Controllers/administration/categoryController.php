<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\categoryRepository;
use App\Repositories\administrator\sectionRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class categoryController extends Controller
{
    private $category;
    private $sections;
    public function __construct(categoryRepository $category,sectionRepository $sections)
    {
        $this->category = $category;
        $this->sections = $sections;
    }
    public function index(Request $request)
    {
        $sections = $this->sections->getList('CREATED');
        $categories = $this->category->getList($request,'CREATED');
         return  Inertia::render('Accounts/administrator/categories/index',compact('sections','categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate(['code'=>'required|unique:categories,id','name'=>'required','section'=>'required']);
        $response = $this->category->create($request);
        return redirect()->back()->with($response['status'],$response['message']);
    }

   
    public function destroy($id)
    {
        $response = $this->category->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

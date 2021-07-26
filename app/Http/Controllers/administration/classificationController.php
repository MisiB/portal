<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\administrator\classificationRepository;
use Inertia\Inertia;
class classificationController extends Controller
{
   private $classification;
   
   public function __construct(classificationRepository $classification)
   {
       $this->classification = $classification;  
   }
    public function index()
    {
          $classifications = $this->classification->getList('CREATED');
          return  Inertia::render('Accounts/administrator/classification/index',compact('classifications'));
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $response = $this->classification->create($request);
        return redirect()->back()->with($response['status'],$response['message']);
    }

  
    public function destroy($id)
    {
        $response = $this->classification->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

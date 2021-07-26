<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Repositories\entity\procurementreturnRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
class procurementreturnController extends Controller
{
   private $returns;

   public function __construct(procurementreturnRepository $returns)
   {
      $this->returns = $returns; 
   }
    public function index()
    {
        $returns = $this->returns->getList();
        return Inertia::render('Accounts/entity/returns/index',compact('returns'));
    }

  
    public function store(Request $request)
    {
         $request->validate(['filename'=>'required|file']);

          $response = $this->returns->create($request);
          return redirect()->back()->with($response['status'],$response['message']);
    }

 
}

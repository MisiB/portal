<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\spocfeeRepository;
use Illuminate\Http\Request;

class spocfeeController extends Controller
{
   private $spocfee;

   public function __construct(spocfeeRepository $spocfee)
   {
      $this->spocfee = $spocfee; 
   }
    public function store(Request $request)
    {
     $request->validate(['price'=>'required']);
     $response = $this->spocfee->create($request);
     return redirect()->back()->with($response['status'],$response['message']);
    }

    
    public function destroy($id)
    {
        $response = $this->spocfee->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);

    }
}

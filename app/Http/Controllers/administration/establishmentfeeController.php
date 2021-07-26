<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\establishmentRepository;
use Illuminate\Http\Request;

class establishmentfeeController extends Controller
{
  
   private $establishment;

   public function __construct(establishmentRepository $establishment)
   {
     $this->establishment = $establishment;   
   }
    public function store(Request $request)
    {
         $request->validate(['lower'=>'required','upper'=>'required|gt:lower','period'=>'required','currency'=>'required','price'=>'required','locality'=>'required']);
         $response = $this->establishment->create($request);
         return redirect()->back()->with($response['status'],$response['message']);
    }

   
    public function destroy($id)
    {
        $response = $this->establishment->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

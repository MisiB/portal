<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\contractfeeRepository;
use Illuminate\Http\Request;

class contractfeeController extends Controller
{
  private $contractfee;

  public function __construct(contractfeeRepository $contractfee)
  {
    $this->contractfee = $contractfee;   
  }
   
    public function store(Request $request)
    {
        $request->validate(['lower'=>'required','upper'=>'required|gt:lower','currency'=>'required','price'=>'required']);
        $response = $this->contractfee->create($request);
        return redirect()->back()->with($response['status'],$response['message']);

    }

    
    public function destroy($id)
    {
        $response = $this->contractfee->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\bidbondcapRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class bidbondcapController extends Controller
{
  private $cap;

  public function __construct(bidbondcapRepository $cap)
  {
       $this->cap = $cap;
  }
    public function index()
    {
         $caplist = $this->cap->getList('CREATED');
         return  Inertia::render('Accounts/administrator/caps/index',compact('caplist'));
    }

    public function store(Request $request)
    {
         $request->validate(['value'=>'required']);
         $response = $this->cap->create($request);
         return redirect()->back()->with($response['status'],$response['message']);
    }

    public function destroy($id)
    {
        $response = $this->cap->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);
    }
}

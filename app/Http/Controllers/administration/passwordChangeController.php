<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\profileRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class passwordChangeController extends Controller
{
    private $change;

    public function __construct(profileRepository $change)
    {
      $this->change = $change;  
    }
    public function index()
    {
        return Inertia::render('Accounts/administrator/profile');   
    }

   
    public function store(Request $request)
    {
         $request->validate(['password' => 'required|string|confirmed|min:8','oldpassword'=>'required']);
         $response = $this->change->update($request);
         return redirect()->back()->with($response['status'],$response['message']);
    }

    
}

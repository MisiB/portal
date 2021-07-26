<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\suppliercommentRepository;
use Illuminate\Http\Request;

class suppliercommentsController extends Controller
{
    private $comment;

    public function __construct(suppliercommentRepository $comment)
    {
      $this->comment = $comment;   
    }
 
    public function store(Request $request)
    {
        $request->validate(['comment'=>'required']);
         $response = $this->comment->create($request);

         return redirect()->back()->with($response['status'],$response['message']);
    }

}

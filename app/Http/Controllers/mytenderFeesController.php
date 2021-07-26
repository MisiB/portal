<?php

namespace App\Http\Controllers;

use App\Repositories\users\mytenderFeesRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class mytenderFeesController extends Controller
{
  
    private $mytender;

    public function __construct(mytenderFeesRepository $mytender)
    {
        $this->mytender = $mytender;
    }
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
         $response = $this->mytender->addInvoice($request);
         if($response['status']=='successMessage')
         {
            return redirect()->route('Tenderpayment.index')->with($response['status'],$response['message']);
         }
         else{
         return redirect()->back()->with($response['status'],$response['message']);
         }
    }

   
    public function show($id)
    {
        $response = $this->mytender->getList($id);
        $notice = $response['notice'];
        $spoc = $response['spoc'];
        $establishment = $response['establishment'];
        return Inertia::render('Accounts/users/mytenders/fees',compact('notice','spoc','establishment'));
    }

   
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

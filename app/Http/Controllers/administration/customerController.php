<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\customerRepository;
use App\Repositories\administrator\suppliertypeRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class customerController extends Controller
{
  private $customer;
  private $types;

  public function __construct(customerRepository $customer,suppliertypeRepository $types)
  {
     $this->customer = $customer; 
     $this->types = $types;  
  }
    public function index(Request $request)
    {
        $customers = $this->customer->search($request);
        return  Inertia::render('Accounts/administrator/customer/index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $customers = $this->customer->search($request);
            return  Inertia::render('Accounts/administrator/customer/index',compact('customers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           $customer = $this->customer->show($id);
 	   $types = $this->types->getList('CREATED');
           return  Inertia::render('Accounts/administrator/customer/show',compact('customer','types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
         $request->validate(['name'=>'required','accounttype'=>'required','country'=>'required']);
        $response = $this->customer->update($request,$id);
        return redirect()->back()->with($response['status'],$response['message']);
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

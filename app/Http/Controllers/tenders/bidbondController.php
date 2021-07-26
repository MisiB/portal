<?php

namespace App\Http\Controllers\tenders;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\bidbondRequest;
use App\Interfaces\mybidbondInterface;
use App\Interfaces\mytenderfeesInterface;
use App\Models\mybidbonds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDF;

class bidbondController extends Controller
{
    private $HELPER;

    private $mybidbond;

    public function __construct(generalHelper $HELPER,mybidbondInterface $mybidbond)
    {
        $this->HELPER = $HELPER;
        $this->mybidbond = $mybidbond;
        $this->middleware('auth');
    }
    public function index()
    {
        //
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
    public function store(bidbondRequest $request)
    {
        $company = $this->HELPER->get_company_name();
        $response = $this->mybidbond->capture($request,$company);
         if($response['status']='successMessage'){
             return redirect()->route('Tenderpayment.index')->with($response['status'],$response['message']);

         }else{
             return redirect()->back()->with($response['status'],$response['message']);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bidbond = mybidbonds::with(['company','invoice'=>function($query){
            $query->where('status','PAID');
            $query->where('type','REFUNDABLE');
        }])->whereuuid($id)->first();
        $pdf = PDF::loadView('bidbond',['bidbond'=>$bidbond]);
    
        return $pdf->download($bidbond->uuid.'.pdf');
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

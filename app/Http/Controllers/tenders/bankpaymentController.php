<?php

namespace App\Http\Controllers\tenders;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\popuploadRequest;
use App\Interfaces\bankpaymentsInterface;
use App\Interfaces\banktransactionsInterface;
use App\Interfaces\rtgsInterface;
use App\Models\tender_invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class bankpaymentController extends Controller
{
 
    private $transaction;

    private $HELPER;

    private $rtgs;

    private $bank;

    public function __construct(generalHelper $HELPER,banktransactionsInterface $transaction,rtgsInterface $rtgs,bankpaymentsInterface $bank)
    {
     $this->transaction = $transaction;
     $this->HELPER = $HELPER;    
     $this->rtgs = $rtgs;
     $this->bank = $bank;
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
    public function store(popuploadRequest $request)
    {
         $company = $this->HELPER->get_company_name();
         $response = $this->rtgs->uploadtender($company,$request);
                  if($response['status']=='successMessage'){
                      $type = $request->type;
                      return Inertia::render('Accounts/users/tenders/fees/confirmupload',compact('type'));
                  }
          


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    {
         $company= $this->HELPER->get_company_name();
         tender_invoice::where(['company_id'=>$company->id,'type'=>$id,'status'=>'PENDING'])->update(['status'=>'AWAITING']);
           $invoice = tender_invoice::where(['company_id'=>$company->id,'status'=>'PENDING'])->get();
          if(count($invoice)>0){
            return redirect()->route('Tenderpayment.index')->with('successMessage','Proof of payment successfully uploaded please  clear outstanding  invoices items to complete the process');  
           }else{
               return redirect()->route('TenderFees.index')->with('successMessage','Bid Bond Request  now awaits pay approval this will only be processed when funds have been identified  in our account');
           }
          }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->HELPER->get_company_name();     
        $response = $this->bank->tenderprocessing($company,$id);
      
       if($response['code']=='completed'){
           return redirect()->route('TenderFees.index')->with($response['status'],$response['message']);
       }else{
        return redirect()->back()->with($response['status'],$response['message']);  
       }
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

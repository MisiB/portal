<?php


namespace App\Repositories\suppliers;


use App\Helpers\generalHelper;
use App\Http\Requests\invoicingRequest;
use App\Interfaces\internalrateInterface;
use App\Interfaces\pricingInterface;
use App\Models\company;
use App\Models\documents;
use App\Models\nonrefundable_invoices;
use App\Models\receipts;
use App\Models\suppliers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class supplier_invoicing_Repository implements \App\Interfaces\suppliers\supplier_invoicing_Interface
{

    private  $HELPER;
    private  $PRICING;
    private  $EXCHANGE;
    public  function  __construct(generalHelper $helper,pricingInterface $pricing, internalrateInterface $rate){

        $this->HELPER = $helper;
        $this->PRICING = $pricing;
        $this->EXCHANGE = $rate;
    }

    public  function  getInvoices($company,$args){
        return nonrefundable_invoices::with('category','currency','receipts','rtgs','transfers')
            ->wherecompany_id($company->id)
            ->where('year','>=',Carbon::now()->year)
            ->whereIn('status',$args)
            ->get();
    }
    public function getInvoice($company)
    {
        return nonrefundable_invoices::with('category','currency','receipts')
                                      ->wherecompany_id($company->id)
                                     ->where('year','>=',Carbon::now()->year)
                                     ->where('status','=','PENDING')
                                     ->get();
    }

    public function retrieveInvoice($inv){
        return nonrefundable_invoices::with('category','currency','receipts')
        ->whereinvoice_number($inv)       
        ->get();   
    }

    public function addItem(invoicingRequest $request,$company)
    {
        $invoicenumber = $this->HELPER->get_invoice_number($company->id);
        if($this->check_currency($invoicenumber,$request->currency))
        {
        $price = $this->PRICING->getPrice($company->locality);
        $rate  = $this->EXCHANGE->getInternalRate($request->currency) ;
        $exchange = !is_null($rate) ? $rate->value : 1;
        $exchange_id = !is_null($rate) ? $rate->id : 0;
        $finalPrice = !is_null($price) ? $price->price *$exchange : 0;
        if($finalPrice>0) {
            nonrefundable_invoices::create([
                'invoice_number' => $invoicenumber,
                'company_id' => $company->id,
                'category_id' => $request->category,
                'year' => $request->year,
                'currency_id' => $request->currency,
                'exchange_id' => $exchange_id,
                'status' => 'PENDING',
                'cost' => $finalPrice,
                'user_id' => $request->user()->id
            ]);
            return array('status'=>'success','message'=>'Category successfully added to category');
        }else{
            return array('status'=>'error','message'=>'Failed to calculate cost  please contact our ICT department');
        }
        }else{
            return array('status'=>'error','message'=>'Multi currency  invoicing not permitted');
        }
    }

    public function removeItem($id)
    {
          /**
         * Get invoice  that wants to be deleted,check if it has been receipted
         */
        $invoice = nonrefundable_invoices::with('receipts')->whereid($id)->first();     
    
         /**
          * check if invoice is settled 
          */
        if($invoice->status != 'PAID')
        {
            /**
             * getting 
             */
            $helper = new generalHelper();

            /**
             * check if invoice was settled
             */
             $helper->check_invoice_settlement($invoice->invoice_number,Auth::user()->email);
             $data  = nonrefundable_invoices::whereinvoice_number($invoice->invoice_number)->wherestatus('PENDING')->get();
             $total_receipted = count($data[0]->receipts)>0 ? $data[0]->receipts->sum('amount') : 0;          
             $total_invoiced = count($data)>0 ? $data->sum('cost') : 0;
             //$status = $this->check_invoice_status($invoice->invoice_number);
             /**
              * check if  total invoiced is  greater than  total receipted
              */
             if($total_invoiced > $total_receipted)
             {
                 /**
                  * check if  total receipted is  greater than zero
                  */
                 if($total_receipted>0){
                     /**
                      * check  number of items on invoice. If  invoie items are greater than  1 allow  delete  and check status of  invoice after deletion
                      */
                     if(count($data)>1){

                    $invoice->status = 'CANCELLED';
                    $invoice->save(); 
                    $status = $this->check_invoice_status($invoice->invoice_number);
                    return array('status'=>$status,'message'=>'Item successfully delete');

                     }else{
                        return array('status'=>'errorMessage','message'=>'A receipt has been  generated torwards invoice cannot be deleted');   
                     }

                 }else{
                    $invoice->status = 'CANCELLED';
                    $invoice->save();
                    return array('status'=>'successMessage','message'=>'Invoice Item deleted');
                 }
             }else{
               $status= $this->check_invoice_status($invoice->invoice_number); 
                return array('status'=>$status,'message'=>'Invoice already settled cannot be deleted');
             }
             return array('status'=>'errorMessage','message'=>'Invoice already settled cannot be deleted');
        }else{
            return array('status'=>'errorMessage','message'=>'Invoice already settled cannot be deleted');
        }

      

    }

    public function checkItem($id,$year,$company){
     return nonrefundable_invoices::wherecategory_id($id)
                                  ->where('year','=',$year)
                                  ->wherecompany_id($company->id)
                                  ->whereIn('status',['PAID','AWAITING','PENDING'])
                                  ->first();
    }

    public function verifyInvoice($invoicenumber){
        $helper = new generalHelper();
        $helper->check_invoice_settlement($invoicenumber,Auth::user()->email);
         $status = $this->check_invoice_status_raw($invoicenumber);
         $message='';
        $code='';
        if($status=='INCOMPETE')
        {
          $message ='Invoice not yet settled';
          $code='errorMessage';
        }
        elseif($status=='PENDING'){
            $message='Invoice settled documents awaitng verification';
            $code='successMessage';
        }elseif($status=='APPROVED'){
            $message ='Invoice settled and documents approved please go to your dashboard to download yr certiificate';
            $code='successMessage';
        }else{
            $message ='No Payment Attempts  found';
            $code='errorMessage';
        }

        return array('status'=>$code,'message'=>$message);
     
          
      
    }
    public function check_invoice_status_raw($invoicenumber){
        $invoice = nonrefundable_invoices::with('receipts')->whereinvoice_number($invoicenumber)->get();
        $total_invoiced = $invoice->sum('cost');
        $receipts = $invoice[0]->receipts;
        $total_receipted = count($receipts)>0 ? $receipts->sum('amount') : 0;
         $status = 'INCOMPLETE';
        if($total_invoiced <= $total_receipted){
             $status ='PENDING';
             nonrefundable_invoices::whereinvoice_number($invoicenumber)->update(['status'=>'PAID']);
             if($this->check_documents($invoice[0]->company_id)){
                 $status ='APPROVED';
             }
            foreach ($invoice as $inv){
                $code = $this->HELPER->helper_generate_code($inv->company->id);
                $uuid = (string)Str::uuid();
                suppliers::firstOrCreate(['company_id'=>$inv->company->id,'category_id'=>$inv->category_id,'expire_year'=>$inv->year],
                    ['company_id'=>$inv->company->id,'category_id'=>$inv->category_id,'uuid'=>$uuid,'expire_year'=>$inv->year,'status'=>$status,'code'=>$code]);
            }

        }
        return $status;

    }

    public function check_invoice_status($invoicenumber){
        $invoice = nonrefundable_invoices::with('receipts')->whereinvoice_number($invoicenumber)->whereIn('status',['PENDING','AWAITING'])->get();
        $total_invoiced = $invoice->sum('cost');
        $receipts = $invoice[0]->receipts;
        $total_receipted = count($receipts)>0 ? $receipts->sum('amount') : 0;
         $status = 'INCOMPLETE';
        if($total_invoiced <= $total_receipted){
             $status ='PENDING';
             nonrefundable_invoices::whereinvoice_number($invoicenumber)->whereIn('status',['PENDING','AWAITING'])->update(['status'=>'PAID']);
             if($this->check_documents($invoice[0]->company_id)){
                 $status ='APPROVED';
             }
            foreach ($invoice as $inv){
                $code = $this->HELPER->helper_generate_code($inv->company->id);
                $uuid = (string)Str::uuid();
                suppliers::firstOrCreate(['company_id'=>$inv->company->id,'category_id'=>$inv->category_id,'expire_year'=>$inv->year],
                    ['company_id'=>$inv->company->id,'uuid'=>$uuid,'category_id'=>$inv->category_id,'expire_year'=>$inv->year,'status'=>$status,'code'=>$code]);
            }

        }
        return $status;

    }

    function  check_currency($invoicenumber,$currency){
        $invoice = nonrefundable_invoices::whereinvoice_number($invoicenumber)->first();
        if(!is_null($invoice)){
             if($invoice->currency_id==$currency){
                 return true;
             }else{
                 return false;
             }
        }else{
            return true;
        }

    }

    function check_documents($id){
        $company = company::whereid($id)->first();
        $documents = documents::whereaccounttype_id($company->accounttype_id)
            ->wherelocality($company->locality)
            ->with(['company'=>function($query)use($company){
                $query->wherecompany_id($company->id);
            }])
            ->get();

        $total_documents = count($documents);
        $total_approved = 0;

        foreach ($documents as $key=>$value){
            if(!is_null($value->company)){
                if(strtoupper($value->company->status) =='APPROVED'){
                    $total_approved++;
                }
            }
        }
        if($total_documents==$total_approved){
            return true;
        }else{
            return false;
        }
    }


}

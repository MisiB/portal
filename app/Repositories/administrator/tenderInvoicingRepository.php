<?php
namespace App\Repositories\administrator;

use App\Helpers\generalHelper;
use App\Models\bidbondfee;
use App\Models\company;
use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use App\Models\rtgs;
use App\Models\tender_invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class tenderInvoicingRepository{
    public function addItem(Request $request){
        $invoice = tender_invoice::where(['company_id'=>$request->company,'tendernumber'=>$request->tendernumber,'description'=>$request->fee])->first();
        $helper = new generalHelper();
        $company = company::whereid($request->company)->first();
        $invoicenumber = $helper->get_tender_invoice_number($company);
        if(is_null($invoice)){ 
            $uuid = Str::uuid();
            $type ='NONREFUNDABLE';
            $path = $request->file('filename')->store('proof','sftp');
             if($request->fee === 'BIDBOND')
              {
                mybidbonds::create(['tendernumber'=>$request->tendernumber,'entity_id'=>$request->entity,'uuid'=>$uuid,'company_id'=>$company->id,'closing_date'=>$request->date,'validityperiod'=>$request->period,'maturitydate'=>Carbon::parse($request->date)->addDays($request->period)]);
               // $this->getEstablishmentFee($request,$invoicenumber,$company);
                $type="REFUNDABLE";
              }else{
                myadministrationfees::create(['company_id'=>$company->id,'entity_id'=>$request->entity,'uuid'=>$uuid,'tendernumber'=>$request->tendernumber,'description'=>$request->fee,'currency_id'=>$request->currency,'amount'=>$request->amount]);
         
              }
              tender_invoice::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'entity_id'=>$request->entity,'tendernumber'=>$request->tendernumber,'type'=>$type,'description'=>$request->fee,'currency_id'=>$request->currency,'year'=>Carbon::now()->year,'amount'=>$request->amount,'status'=>'AWAITING','admin_id'=>Auth::guard('admin')->user()->id,'source'=>'ML']);
              rtgs::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'type'=>$type,'filename'=>$path,'currency_id'=>$request->currency,'amount'=>$request->amount,'name'=>$request->bank,'status'=>'PENDING']);
              return array('status'=>'successMessage','message'=>'Item successfully added now awaiting  payment verification');
            }else{
            return array('status'=>'errorMessage','message'=>'item already added to invoice');
        }
    }

    public function getInvoice($id){
        return tender_invoice::with('currency','receipts')->wherecompany_id($id)->wherestatus('PENDING')->get();
    }

    public function removeItem($id){
        $invoice = tender_invoice::whereid($id)->wherestatus('PENDING')->first();
        if(!is_null($invoice)){
           if($invoice->description==='ESTABISHMENT FEE' || $invoice->description==='BIDBOND'){
               tender_invoice::whereinvoice_number($invoice->invoice_number)->wherestatus('PENDING')->delete();
                mybidbonds::wherecompany_id($invoice->company_id)->wheretendernumber($invoice->tendernumber)->wherepaymentstatus('PENDING')->delete();             
                myadministrationfees::wherecompany_id($invoice->company_id)->wheretendernumber($invoice->tendernumber)->wherepaymentstatus('PENDING')->delete();
            

           }else{
               $invoice->delete();
           }
           return array('status'=>'successMessage','message'=>'Invoice successfully deleted');
        }else{
            return array('status'=>'errorMessage','message'=>'Invoice not found');
        }
    }

    function getEstablishmentFee($request,$invoicenumber,$company){
    
        $fees = bidbondfee::wherecurrency_id($request->currency)->wherelocality($company->locality)->wherestatus('CREATED')->wherevalidityperiod($request->period)->get();
        foreach ($fees as $key => $value) {
             if($value->lowerlimit < $request->amount && $request->amount <= $value->upperlimit){
                 $uuid = Str::uuid();
                 $fee ='ESTABISHMENT FEE';
                myadministrationfees::create(['company_id'=>$company->id,'entity_id'=>$request->entity,'uuid'=>$uuid,'tendernumber'=>$request->tendernumber,'description'=>$fee,'currency_id'=>$request->currency,'amount'=>$value->amount]);
                tender_invoice::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'tendernumber'=>$request->tendernumber,'type'=>'NONREFUNDABLE','description'=>$fee,'currency_id'=>$request->currency,'year'=>Carbon::now()->year,'amount'=>$value->amount,'status'=>'PENDING']);
 
            }
        }
    }
}
<?php
namespace App\Repositories\users;

use App\Helpers\generalEntityHelper;
use App\Helpers\generalHelper;
use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use App\Models\procurementnotices;
use App\Models\rtgs;
use App\Models\tender_invoice;
use App\Models\transfers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;

class mytenderFeesRepository{

    private $helper;

    public function __construct(generalEntityHelper $helper)
    {
      $this->helper = $helper;   
    }
    public function getList($uuid){
        $notice =  procurementnotices::with('procurementtype','currency','createdby','publishedby','products.categories.category','classification')->whereuuid($uuid)->first();  
        $spocfee=0;
        $establishmentfee =0;
        if($notice->procurementtype_id=='2'){
            $spocfee = $this->helper->calculate_spoc($notice->id);
            $establishmentfee = $this->helper->calculate_establishmentfee($notice->id);
        }
        return array('notice'=>$notice,'spoc'=>$spocfee,'establishment'=>$establishmentfee);
    }
    public function addManual(Request $request){
      $HELPER = new generalHelper();
      $company = Auth::user()->company;
      $invoicenumber = $HELPER->get_tender_invoice_number($company);
      $type = 'NONREFUNDABLE';
       $uuid = Str::uuid();
      if($request->feetype=='BIDBOND'){
        $type='REFUNDABLE';
        mybidbonds::create(['tendernumber'=>$request->tendernumber,'uuid'=>$uuid,'entity_id'=>$request->entity,'company_id'=>$company->id,'closing_date'=>Carbon::parse($request->closedate),'validityperiod'=>$request->period,'maturitydate'=>Carbon::parse($request->closedate)->addDays($request->period),'amount'=>$request->amount,'currency'=>$request->currency]);
       }else{
        myadministrationfees::create(['tendernumber'=>$request->tendernumber,'uuid'=>$uuid,'entity_id'=>$request->entity,'company_id'=>$company->id,'description'=>$request->feetype,'amount'=>$request->amount,'currency_id'=>$request->currency]);
           
       } 
      if(!tender_invoice::where(['company_id'=>$company->id,'tendernumber'=>$request->tendernumber,'description'=>$request->feetype])->exists()){
        tender_invoice::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'tendernumber'=>$request->tendernumber,'entity_id'=>$request->entity,'type'=>$type,'description'=>$request->feetype,'currency_id'=>$request->currency,'year'=>Carbon::now()->year,'amount'=>$request->amount,'status'=>'AWAITING']);
        $files = $request->file('files');
        for ($i=0; $i <count($files) ; $i++) { 
            $path = $files[$i]->store('proofs','sftp');
            $bank = $request->bank[$i];
            $referencenumber = $request->referencenumber[$i];
            $date = $request->date[$i];

              transfers::firstOrcreate(['referencenumber'=>$referencenumber],['invoicenumber'=>$invoicenumber,'referencenumber'=>$referencenumber]);        
            rtgs::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'type'=>$type,'filename'=>$path,'currency_id'=>$request->currency,'amount'=>$request->amount,'name'=>$bank]);
         


        }
       return array('status'=>'successMessage','message'=>$request->feetype.'Successfully Submitted for Processing You will be notified once the process has been completed');
      }
    }

   
    public function addInvoice(Request $request){
        $notice =  procurementnotices::whereid($request->id)->first();
        $company = Auth::user()->company;
        $HELPER = new generalHelper();
        $uuid = Str::uuid();
        if(!tender_invoice::where(['company_id'=>$company->id,'status'=>'PENDING'])->exists())
        {
        $invoicenumber = $HELPER->get_tender_invoice_number($company);
        if($request->type==='BIDBOND')
          {
            $bidbond = $notice->bidsecurity;
           
             if(!tender_invoice::where(['company_id'=>$company->id,'tendernumber'=>$notice->tendernumber,'description'=>$request->type])->exists()){
               tender_invoice::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'entity_id'=>$notice->entity_id,'tendernumber'=>$notice->tendernumber,'type'=>'REFUNDABLE','description'=>$request->type,'currency_id'=>$notice->currency_id,'year'=>Carbon::now()->year,'amount'=>$bidbond,'status'=>'PENDING']);
               mybidbonds::create(['tendernumber'=>$notice->tendernumber,'uuid'=>$uuid,'entity_id'=>$notice->entity_id,'company_id'=>$company->id,'closing_date'=>$notice->close_date,'validityperiod'=>$notice->validityperiod,'maturitydate'=>Carbon::parse($notice->close_date)->addDays($notice->validityperiod),'amount'=>$bidbond,'currency'=>$notice->currency->name]);
               return array('status'=>'successMessage','message'=>'Bid Security Fee Successfully added to Invoice');
            }else{
                 return array('status'=>'errorMessage','message'=>'Bid Security Fee already added to invoice');
             }
          }

          if($request->type=='ESTABISHMENT FEE')
          {
            $establishmentfee = $this->helper->calculate_establishmentfee($notice->id);
            if(!tender_invoice::where(['company_id'=>$company->id,'tendernumber'=>$notice->tendernumber,'description'=>$request->type])->exists()){
                tender_invoice::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'entity_id'=>$notice->entity_id,'tendernumber'=>$notice->tendernumber,'type'=>'NONREFUNDABLE','description'=>$request->type,'currency_id'=>$notice->currency_id,'year'=>Carbon::now()->year,'amount'=>$establishmentfee,'status'=>'PENDING']);
                myadministrationfees::create(['tendernumber'=>$notice->tendernumber,'uuid'=>$uuid,'entity_id'=>$notice->entity_id,'company_id'=>$company->id,'description'=>$request->type,'amount'=>$establishmentfee,'currency_id'=>$notice->currency->id]);
                return array('status'=>'successMessage','message'=>'Establishment Fee Successfully added to Invoice');
            }else{
                return array('status'=>'errorMessage','message'=>'Tender Fee already added to invoiced');
            }
          }

          if($request->type=='SPOC')
          {
            $spocfee = $this->helper->calculate_spoc($notice->id);
            if(!tender_invoice::where(['company_id'=>$company->id,'tendernumber'=>$notice->tendernumber,'description'=>$request->type])->exists()){
                tender_invoice::create(['company_id'=>$company->id,'invoice_number'=>$invoicenumber,'entity_id'=>$notice->entity_id,'tendernumber'=>$notice->tendernumber,'type'=>'NONREFUNDABLE','description'=>$request->type,'currency_id'=>$notice->currency_id,'year'=>Carbon::now()->year,'amount'=>$spocfee,'status'=>'PENDING']);
                myadministrationfees::create(['tendernumber'=>$notice->tendernumber,'uuid'=>$uuid,'entity_id'=>$notice->entity_id,'company_id'=>$company->id,'description'=>$request->type,'amount'=>$spocfee,'currency_id'=>$notice->currency->id]);        
                return array('status'=>'successMessage','message'=>'SPOC Fee Successfully added to Invoice');
            }else{
                return array('status'=>'errorMessage','message'=>'Tender Fee already added to invoiced');
            }
          }
        }else{
          return array('status'=>'successMessage','message'=>'Please settle Pending Item on Invoice');
        }
    }
    public function removeitem($invoicenumber,$company)
    {
           $invoice = tender_invoice::where(['invoice_number'=>$invoicenumber,'company_id'=>$company->id,'status'=>'PENDING'])->get();
           if(count($invoice)>0){
                  tender_invoice::where(['invoice_number'=>$invoicenumber,'company_id'=>$company->id,'status'=>'PENDING'])->delete();
                  return array('status'=>'successMessage','message'=>'Invoice Successfully Deleted');
           }else{
               return array('status'=>'errorMessage','message'=>'No pending invoices found');
           }
    }

    public function delete($id,$company){
      $invoice = tender_invoice::whereid($id)->wherecompany_id($company->id)->first();
      if(!is_null($invoice))
      {
          if($invoice->status == "PENDING" || $invoice->status == "AWAITING"){
             
            $invoice->delete();
           
            return array("status"=>'successMessage',"message"=>'Invoice Successfully Cancelled');

          }else{
            return array("status"=>'errorMessage',"message"=>'Invoice cannot be cancelled');   
          }

      }
      else
      {
       return array("status"=>'errorMessage',"message"=>'Invoice not found');
      }
 }

 public function download($id,$company){
   $invoice = tender_invoice::whereid($id)->wherecompany_id($company->id)->wherestatus('PAID')->first();
   if(!is_null($invoice)>0){
   $entity = $invoice->entity;
   if($invoice->description =='BIDBOND'){

    $bidbond = mybidbonds::with(['company','invoice'=>function($query){
      $query->where('status','PAID');
      $query->where('type','REFUNDABLE');
  }])->wherecompany_id($invoice->company_id)->wheretendernumber($invoice->tendernumber)->wherepaymentstatus('PAID')->first();
  $pdf = PDF::loadView('bidbond',['bidbond'=>$bidbond,'entity'=>$entity]);

  return $pdf->download($bidbond->uuid.'.pdf');

   }else{
    $admin = myadministrationfees::with(['company','currency'])->wherecompany_id($invoice->company_id)->wheredescription($invoice->description)->wheretendernumber($invoice->tendernumber)->wherepaymentstatus('PAID')->first();
    $pdf = PDF::loadView('adminreceipt',['admin'=>$admin,'entity'=>$entity]); 
    return $pdf->download($admin->uuid.'.pdf');
   }
   }else{
     return array('status'=>'errorMessage','message'=>'Invoice not found');
   }
 }

}
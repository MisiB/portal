<?php


namespace App\Helpers;

use App\Models\invoicenumbers;
use App\Models\nonrefundable_invoices;
use App\Models\receiptnumbers;
use App\Models\User;
use Carbon\Carbon;
use DB;
use App\Models\company;
use App\Models\currency;
use App\Models\documents;
use App\Models\myadministrationfees;
use App\Models\mybidbonds;
use App\Models\onlinepayments;
use App\Models\accountnumbers;
use App\Models\receipts;
use App\Models\statement;
use App\Models\suppliers;
use App\Models\tender_invoice;
use App\Notifications\paymentNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Paynow\Payments\Paynow;
use Illuminate\Support\Str;
use App\Repositories\suspenseRepository;

class generalHelper
{


   public  function  get_company_name(){
       return Auth::user()->company;
   }

   public function get_company_by_regnumber($regno){
       return company::whereregnumber($regno)->first();
   }

    public function  helper_generate_code($id){
        $rand = rand(1000,2000);
        return "PRAZ-".Carbon::now()->year."-".$rand.'-'.$id;
    }

    public function  helper_generate_tender_code($id,$type){
        $rand = rand(1000,2000);
        $salt='ADMIN';
        if($type=='REFUNDABLE'){
            $salt='BBOND';
        }
        return "PRAZ-".$salt.'-'.Carbon::now()->year."-".$rand.'-'.$id;
    }

   public  function  check_company_name($name){
       $cleanname =  preg_replace('/\s+/', '', $name);
       $cleanname = str_ireplace('(Private)Limited','',$cleanname);
       $cleanname = str_ireplace('P/L','',$cleanname);
       $cleanname = str_ireplace('PrivateLimited','',$cleanname);
       $cleanname = str_ireplace('Investments','',$cleanname);
       $cleanname = str_ireplace('Investment','',$cleanname);
       $cleanname = str_ireplace('Pvtltd','',$cleanname);
       $first_three_letters = substr($cleanname,0,4);
       $customers =  DB::select("select * from companies where name LIKE '%".$first_three_letters."%'");
       if(count($customers)>0)
       {
           foreach ($customers as $key => $value) {
               //$request_array = str_split(strtoupper($cleanname));
               $db_name = preg_replace('/\s+/', '', $value->name);
               $db_name = str_ireplace('(Private)Limited','',$db_name);
               $db_name = str_ireplace('P/L','',$db_name);
               $db_name = str_ireplace('PrivateLimited','',$db_name);
               $db_name = str_ireplace('Investments','',$db_name);
               $db_name = str_ireplace('Investment','',$db_name);
               $db_name = str_ireplace('Pvtltd','',$db_name);
               $compare = strcasecmp(strtoupper($cleanname),strtoupper(preg_replace('/\s+/', '', $db_name)));
               if($compare==0)
               {
                   /**
                    * company exists
                    */

                   $user = User::wherecompany_id($value->id)->first();

                   /**
                    * check if the account has  users
                    */
                   if(!$user){
                       $company = company::whereid($value->id)->first();
                       $company->delete();
                       return 0;
                   }
                   return $value->id;
               }


           }
           return 0;
       }

   }
    public function regnumber(){
        $company = count(company::get());
        return "PR".\Carbon\Carbon::now()->micro."".($company+1);
    }

    public  function  get_locality($company){
        $locality = "local";
        if($company!=='Zimbabwe')
        {
            $locality ="foreign";
        }
        return $locality;
    }


        public function get_invoice_number($company)
        {
            $invoice = nonrefundable_invoices::where(['company_id'=>$company])
                                              ->where('year','>=',Carbon::now()->year)
                                              ->where('status','=','PENDING')
                                              ->first();
            if(!is_null($invoice))
            {
                return $invoice->invoice_number;
            }
            else{
                $number = invoicenumbers::first();
                $invoice= 'inv'.Carbon::now()->year.''.Carbon::now()->month.''.Carbon::now()->day.''.$number->invoice;
                $number->invoice = $number->invoice+1;
                $number->save();
                return $invoice;
            }
        }

        public function get_tender_invoice_number($company)
        {
                    
                $number = invoicenumbers::first();
                $invoice= 'invT'.Carbon::now()->year.''.Carbon::now()->month.''.Carbon::now()->day.''.$number->invoice.''.$company->id;
                $number->invoice = $number->invoice+1;
                $number->save();
                return $invoice;
            
        }

    public function get_receipt_number(){
        $number = receiptnumbers::first();
        $receipt = 'rpt'.Carbon::now()->year.''.Carbon::now()->month.''.Carbon::now()->day.''.$number->receipt;
        $number->receipt = $number->receipt+1;
        $number->save();
        return $receipt;
    }

   public  function create_new_company($request){
       $company = company::create([
           'regnumber'=>$this->regnumber(),
           'name'=>$request->company,
           'accounttype_id'=>$request->accounttype,
           'city'=>$request->city,
           'country'=>$request->country,
           'locality'=>$this->get_locality($request->country),
           'province'=>$request->province,
           'district'=>$request->district
           ]);
        if(!is_null($company)){
            $user = User::create([
                'name' => $request->name,
                'surname'=>$request->surname,
                'email'=>$request->email,
                'company_id'=>$company->id,
                'role_id'=>'9',
                'status'=>'ACTIVE',
                'password' => Hash::make($request->password)
            ]);

            return $user;
        }

        return null;

   }

    public function paynowMobile(){
        $paynow  = new Paynow('7628','50bccfe1-a756-4930-9596-d62a9fdb5a86','https://portal.praz.org.zw/payment/Update','https://portal.praz.org.zw/payment/Update');
        return $paynow;
    }

    public function paynowOnline(){
        $paynow  = new Paynow('7708','002667b4-1998-49b7-a080-54a70a3380fa','https://portal.praz.org.zw/bidders/check','https://portal.praz.org.zw/bidders/check');
        return $paynow;
    }
    
    public function getEmail(){

        return Auth::user()->email;
    }
    public function check_invoice_settlement($inv,$email){
     $invoice = nonrefundable_invoices::with('company.users')->whereinvoice_number($inv)->get();
     $suspense = new suspenseRepository();
     if(count($invoice)>0){
      $total_invoice = $invoice->sum('cost');
      
       /**
        * get online  if user has any onlune payments
        */

        $onlinepayments = onlinepayments::whereinvoice_number($inv)->get();

          $message="";
          $code="";
          if(count($onlinepayments)>0){
            $email = $this->getEmail();
           

             foreach ($onlinepayments as $key => $value) {
                 if($value->status !='paid')
                 {
                    $paynow = $this->paynowMobile();
                    if($value->mode === 'PAYNOW'){
                        $paynow = $this->paynowOnline();
                    }
                   $status = $paynow->pollTransaction($value->poll_url);
                   if (!empty($status))
                   {
                       if (strtoupper($status->status()) == 'PAID' || strtoupper($status->status()) == 'AWAITING DELIVERY') {
                           $value->status = $status->status();
                           $value->save();
                           $receiptnumber = $this->get_receipt_number();
                           receipts::firstOrCreate(
                               ['source_id' => $value->id, 'method' =>$value->mode],
                               ['invoicenumber' => $value->invoice_number,
                                   'receiptnumber' => $receiptnumber,
                                   'source_id' => $value->id,
                                   'company_id' => $value->company_id,
                                   'method' => $value->mode, 
                                   'currency' => $value->invoice->currency->name,
                                   'amount' => $value->amount,
                                   'user_id' => $value->company->users[0]->id
                               ]
                           );

                           $statement = statement::whereidentifier($value->invoice_number)->wheresource('nonrefundable_invoices')->first();
                           if (!is_null($statement)) {
                               if ($statement->amount != $total_invoice) {
                                   $statement->amount = $total_invoice;
                                   $statement->save();
                               }
                           } else {
                               statement::create(['company_id' => $value->company_id, 'identifier' => $value->invoice_number, 'description' => 'INVOICING', 'source' => 'nonrefundable_invoices', 'flag' => 'DR', 'amount' =>$total_invoice]);
                           }

                           if (!statement::whereidentifier($receiptnumber)->wheresource('receipts')->exists()) {
                               statement::create(['company_id' => $value->company_id, 'identifier' => $receiptnumber, 'description' => 'RECEIPTING:' . $value->mode, 'source' => 'receipts', 'flag' => 'CR', 'amount' =>$value->amount]);
                           } 
                           //$accountnumber = $this->getAccountNumber($value->company,$value->invoice->currency->name,'NONREFUNDABLE');
                          // $args = array("banktransaction_id"=>$value->id,'source'=>$value->mode,'company_id'=>$value->company_id,'accountnumber'=>$accountnumber[0]['accountnumber'],'currency'=>$value->invoice->currency->name,'amount'=>$value->amount);
                          //  $suspense->captureMobile($args);
                           $code = 'successMessage';
                        //   $message="Wallet successfully topped up";

                       } elseif (strtoupper($status->status()) == 'SENT' || strtoupper($status->status()) == 'CANCELLED') {
                           $value->status = $status->status();
                           $value->save();
                           $message = ' Your payment attempt was ' . $status->status();
                           $code = 'errorMessage';

                       } else {
                           $message='Failed to completed please retry';
                           }
                       return array('status'=>$code,'message'=>$message);
               }
                 }
             }
          }

     }

     
    }

    public function getCurrency(){
        return currency::get();
    }

    public function get_invoice_balance($invoicenumber){
        $invoice = nonrefundable_invoices::with('receipts')->whereinvoice_number($invoicenumber)->whereIn('status',['PENDING','AWAITING'])->get();
        $total_invoiced = $invoice->sum('cost');
        $receipts = $invoice[0]->receipts;
        $total_receipted = count($receipts)>0 ? $receipts->sum('amount') : 0;
        $due = $total_invoiced - $total_receipted;     
        return $due;

    }
    public function check_invoice_status($invoicenumber){
        $invoice = nonrefundable_invoices::with('receipts')->whereinvoice_number($invoicenumber)->whereIn('status',['PENDING','AWAITING'])->get();
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
                $code = $this->helper_generate_code($inv->company->id);
                $uuid = (string) Str::uuid();
                suppliers::firstOrCreate(['company_id'=>$inv->company->id,'uuid'=>$uuid,'category_id'=>$inv->category_id,'expire_year'=>$inv->year],
                    ['company_id'=>$inv->company->id,'category_id'=>$inv->category_id,'expire_year'=>$inv->year,'status'=>$status,'code'=>$code]);
            }

        }
        return $status;

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


    function registersupplier($invoicenumber){
        $invoice =  nonrefundable_invoices::whereinvoice_number($invoicenumber)->get();
       
       $status ='PENDING';
        if($this->check_documents($invoice[0]->company_id)){
            $status ='APPROVED';
        }
       foreach ($invoice as $inv){
           $code = $this->helper_generate_code($inv->company->id);
           $uuid = (string)Str::uuid();
           suppliers::firstOrCreate(['company_id'=>$inv->company->id,'category_id'=>$inv->category_id,'expire_year'=>$inv->year],
               ['company_id'=>$inv->company->id,'category_id'=>$inv->category_id,'uuid'=>$uuid,'expire_year'=>$inv->year,'status'=>$status,'code'=>$code]);
      
        $inv->status = 'PAID';
        $inv->save();
      }
    }

    function registerTenderfee($id){
        $invoice = tender_invoice::whereid($id)->first();
        if(!is_null($invoice))
        {
            $code = $this->helper_generate_tender_code($invoice->company_id,$invoice->type);
            if($invoice->type=='NONREFUNDABLE')
            {
                $adminfee = myadministrationfees::where(['company_id'=>$invoice->company_id,'tendernumber'=>$invoice->tendernumber,'description'=>$invoice->description])->first();
                if(!is_null($adminfee))
                {
                $adminfee->code = $code;
                $adminfee->amount = $invoice->amount;
                $adminfee->paymentstatus ='PAID';
                $adminfee->save();
                }else{
                    $uuid = Str::uuid();
                    myadministrationfees::create([
                        'company_id'=>$invoice->company_id,
                        'uuid'=>$uuid,
                        'entity_id'=>$invoice->entity->id,
                        'tendernumber'=>$invoice->tendernumber,
                        'description'=>$invoice->description,
                        'currency_id'=>$invoice->currency_id,                        
                        'code'=>$code,
                        'amount'=>$invoice->amount,
                        'paymentstatus'=>'PAID'
                    ]);
                }
            }else{
                $bidbond = mybidbonds::where(['company_id'=>$invoice->company_id,'tendernumber'=>$invoice->tendernumber])->first();
                if(!is_null($bidbond)){
                    $bidbond->paymentstatus ='PAID';
                    $bidbond->code = $code;
                    $bidbond->amount = $invoice->amount;
                    $bidbond->currency = $invoice->currency->name;
                    $bidbond->save();
                }
            }

            $invoice->status='PAID';
            $invoice->save();

        }
    }

    function manualregisterTenderfee($id){
        $invoice = tender_invoice::whereid($id)->first();
        if(!is_null($invoice))
        {
            $code = $this->helper_generate_tender_code($invoice->company_id,$invoice->type);
            if($invoice->type=='NONREFUNDABLE')
            {
                $adminfee = myadministrationfees::where(['company_id'=>$invoice->company_id,'tendernumber'=>$invoice->tendernumber,'description'=>$invoice->description])->first();
                if(!is_null($adminfee))
                {
                $adminfee->code = $code;
                $adminfee->amount = $invoice->amount;
                $adminfee->paymentstatus ='PAID';
                $adminfee->save();
                }else{
                    $uuid = Str::uuid();
                    myadministrationfees::create([
                        'company_id'=>$invoice->company_id,
                        'uuid'=>$uuid,
                        'entity_id'=>$invoice->entity->id,
                        'tendernumber'=>$invoice->tendernumber,
                        'description'=>$invoice->description,
                        'currency_id'=>$invoice->currency_id,                        
                        'code'=>$code,
                        'amount'=>$invoice->amount,
                        'paymentstatus'=>'PAID'
                    ]);
                }
            }else{
                $bidbond = mybidbonds::where(['company_id'=>$invoice->company_id,'tendernumber'=>$invoice->tendernumber])->first();
                if(!is_null($bidbond)){
                    $bidbond->paymentstatus ='PAID';
                    $bidbond->code = $code;
                    $bidbond->amount = $invoice->amount;
                    $bidbond->currency = $invoice->currency->name;
                    $bidbond->save();
                }
            }

            $invoice->status='PAID';
            $invoice->approved_by = Auth::guard('admin')->user()->id;
            $invoice->save();

        }
    }

    function getType($accountnumber){
        if($accountnumber=='10721064850020'){
            return 'NONREFUNDABLE';
        }elseif ($accountnumber=='10721064850030') {
           return 'REFUNDABLE';
        }
         elseif ($accountnumber=='10721064850118') {
           return 'REFUNDABLE';
        }
        elseif ($accountnumber=='10721064850040') {
           return 'REFUNDABLE';
        }elseif ($accountnumber=='107210648501080') {
           return 'REFUNDABLE';
        }
    }

    function getAccount($type,$currency){
        if($currency=='ZWL' && $type=='NONREFUNDABLE'){           
            return '10721064850020';
        }elseif ($currency=='ZWL' && $type=='SUPPLIER') {
            return '10721064850020';
         }elseif ($currency=='USD' && $type=='SUPPLIER') {
            return '10721064850040';
         }elseif ($currency=='ZWL' && $type=='REFUNDABLE') {
           return '10721064850030';
        }
        elseif ($currency=='USD' && $type=='REFUNDABLE') {
           return '10721064850040';
        }elseif ($currency=='USD' && $type=='NONREFUNDABLE') {
           return '10721064850108';
        }
    }

    function getAccountNumber($company,$currency,$type){
        $accountnumber=array();
      
          $accountnumbers =  accountnumbers::where(['currency'=>$currency,'type'=>$type])->get();
              foreach ($accountnumbers as $key => $value) {
            $accountnumber[] =array("accountnumber"=>$value->accountnumber);
            }
        

        return $accountnumber;
    }

  function get_account_numbers($currency,$type){
         if($type =='SUPPLIER'){
             $type='NONREFUNDABLE';
         }
        return accountnumbers::where(['currency'=>$currency,'type'=>$type])->get();
    }

    function get_account_type($accountnumber){
        return accountnumbers::whereaccountnumber($accountnumber)->get();
    }



}

<?php

namespace App\Console\Commands;

use App\Models\bank_rate;
use Illuminate\Console\Command;
use App\Models\company;
use App\Models\ledgeraccounts;
use App\Models\nonrefundable_invoices;
use App\Models\receipts;
use App\Models\tender_invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class palladium extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'palladium:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command posts  transactions to palladium';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $ledgers = ledgeraccounts::get();
        
        /**
         * get customers
         */
         
        company::with('contacts')->whereposted(0)->chunkById(200,function($customers){
             
            $customerarray=[];
            foreach ($customers as $key => $value) {
                $emails = !is_null($value->contacts) ? $value->contacts->emails:$value->regnumber.'@dummy.co.zw';
                $phones = !is_null($value->contacts) ? $value->contacts->phonenumbers:rand(10000,100000);
                $address = !is_null($value->contacts) ? $value->contacts->address:'dummy address';
                 $created_at =  !is_null($value->created_at) ? $value->created_at : Carbon::now();
                $customerarray = array('source_id'=>$value->id,'regnumber'=>$value->regnumber,'name'=>utf8_encode($value->name),'phones'=>$phones,'emails'=>$emails,'address'=>$address,'created_at'=>$created_at);
                DB::connection('mysql_remote')->table('accountdetails')->insert($customerarray);
                $value->posted =1;
               $value->save();
              }
             
              
         },$column='id'); 
       /*   if(count($customers)>0){
             $customerarray=[];
              foreach ($customers as $key => $value) {
                  $emails = !is_null($value->contacts) ? $value->contacts->emails:$value->regnumber.'@dummy.co.zw';
                  $phones = !is_null($value->contacts) ? $value->contacts->phones:rand(10000,100000);
                  $address = !is_null($value->contacts) ? $value->contacts->address:'dummy address';
                  $customerarray[] = array('source_id'=>$value->id,'regnumber'=>$value->regnumber,'name'=>$value->name,'phones'=>$phones,'emails'=>$emails,'address'=>$address);
                 $value->posted =1;
                 $value->save();
                }

                DB::connection('mysql_remote')->table('account_details')->insert($customerarray);
         } 
        /**
         * get supplier invoices 
         */

      nonrefundable_invoices::with('category','company')->whereposted(0)->wherestatus('PAID')->where('year','=',Carbon::now()->year)->chunkById(200,function($supplierinvoices){
        if(count($supplierinvoices)>0)
        {
            
            foreach ($supplierinvoices as $key => $value) {
                if(!is_null($value->company))
                {
                    if(!is_null($value->category))
                    {
                     
                        $supplier_invoices = array(
                                                   'invoice_number'=>$value->invoice_number,
                                                    'year'=>$value->year,
                                                    'name'=>$value->currency->name,
                                                    'regnumber'=>$value->company->regnumber,
                                                    'cost'=>$value->cost,
                                                    'code'=>$value->category->code,
                                                    'source_id'=>$value->id,
                                                    'updated_at'=>$value->updated_at,
                                                    'description'=>!is_null($value->category)? $value->category->name : 'SUPPLIER REGISTRATION',                                                    
                                                    'additional'=>'SUPPLIER',
                                                 
                                                   );
                        DB::connection('mysql_remote')->table('invoices')->insert($supplier_invoices);
                        $value->posted=1;
                        $value->save();
                      
                    }
                }
            }
          
           
        }
         },$column='id');
          
        
          tender_invoice::with('company')->whereposted(0)->wherestatus('PAID')->where('year','=',Carbon::now()->year)->chunkById(200,function($tenderinvoices)use($ledgers){
            if(count($tenderinvoices)>0)
            {
                $tender_invoices=[];
              
                foreach ($tenderinvoices as $key => $value) {
                
                   $tender_invoices = array('invoice_number'=>$value->invoice_number,
                                               'updated_at'=>$value->updated_at,
                                               'year'=>$value->year,
                                               'name'=>$value->currency->name,
                                               'regnumber'=>$value->company->regnumber,
                                               'cost'=>$value->amount,
                                               'code'=>$value->description,
                                               'description'=>$value->description,
                                               'source_id'=>$value->id,
                                               'additional'=>$value->tendernumber
                                               );
                DB::connection('mysql_remote')->table('invoices')->insert($tender_invoices);
                    $value->posted=1;
                    $value->save();
                    
                }
               
               
            }
         },$column='id');
          

        $receipts =  receipts::with('supplierinvoices','tenderinvoices')->whereposted(0)->whereYear('created_at',Carbon::now()->year)->get();
        
        if(count($receipts)>0){
            $receiptsarray=[];
             foreach ($receipts as $key => $value) {

                if(count($value->supplierinvoices)>0 || count($value->tenderinvoices)>0 )
                {
                
                $account ="";
                
                foreach ($ledgers as $ky => $val) {

                   if(str_replace(' ', '',$value->description) == str_replace(' ', '',$val->type))
                   {
                      
                       $account = $val->account;
                       break;
                   }

                }
               
                if($account !="")
                {
                  
                 if(!is_null($value->company))
                 {
                     $rate = 1;
                     if($value->currency=='USD'){
                         $exchange =  bank_rate::orderBy('id','desc')->first();
                         if(!is_null($exchange)){
                             $rate = $exchange->value;
                         }
                     }
                    $receiptsarray= array('receiptnumber'=>$value->receiptnumber,
                                          'invoicenumber'=>$value->invoicenumber,
                                          'regnumber'=>$value->company->regnumber,
                                          'method'=>$value->method,
                                          'currency'=>$value->currency,
                                          'amount'=>$value->amount,
                                          'account'=>$account,
                                          'description'=>$value->description,
                                          'created_at'=>$value->created_at,
                                          'rate'=>$rate
                                          );
                                          DB::connection('mysql_remote')->table('receipted')->insert($receiptsarray);
                 $value->posted=1;
                 $value->save();
                 }
                }
             }
            
            }
        }
    }
}

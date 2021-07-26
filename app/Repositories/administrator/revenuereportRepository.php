<?php

namespace App\Repositories\administrator;

use App\Models\currency;
use App\Models\nonrefundable_invoices;
use App\Models\suppliers;
use App\Models\tender_invoice;
use Illuminate\Http\Request;
use Carbon\Carbon;
class revenuereportRepository{

    public function getList(Request $request){
           
        $currencylist = currency::wherestatus('CREATED')->get();
         $currency =  $request !="" ? $request->currency : 2;
         $from =  $request!= "" ? $request->fromdate  : Carbon::now()->yesterday();
         $to =  $request!= "" ? $request->todate  : Carbon::now()->tomorrow();
         $status = $request!= "" ? $request->status  : 'PAID';
          $supplierinvoices = nonrefundable_invoices::with('receipts')
                                                     ->wherebetween('created_at',[$from,$to])
                                                    ->wherestatus($status)
                                                    ->wherecurrency_id($currency)
                                                    ->get();

          $grouped =  $supplierinvoices->groupBy('invoice_number');
            $supplierarray =[];
            $totalinvoiced = 0;
            $totalreceipted = 0;
            $totalregistred = 0;
            $currencyname = '';
           foreach ($grouped as $key => $value) {
               $registered=0;
               foreach ($value as $ky => $val) {
                  if(suppliers::where(['company_id'=>$val->company_id,'category_id'=>$val->category_id,'expire_year'=>$val->year])->exists()){
                      $registered++;
                      $totalregistred++;
                  }
               }
               $currencyname = $value[0]->currency->name;
               $company = !is_null($value[0]->company) ? $value[0]->company->name : 'null'; 
               $totalinvoiced = $totalinvoiced + (int)$value->sum('cost');
               $totalreceipted = $totalreceipted +(int)$value[0]->receipts->sum('amount');
               $supplierarray[]= array('date'=>$value[0]->updated_at,'invoicenumber'=>$key,'currency'=>$value[0]->currency->name,'company'=>$company,'totalinvoiced'=>$value->sum('cost'),'totalreceipted'=>$value[0]->receipts->sum('amount'),"categories"=>$registered);
           }

     

        return array('suppliers'=>$supplierarray,'currencylist'=>$currencylist,'totalinvoiced'=>$totalinvoiced,'totalreceipted'=>$totalreceipted,'totalregistered'=>$totalregistred,'currencyname'=>$currencyname);

    }
}
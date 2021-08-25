<?php
namespace App\Repositories\administrator;

use App\Models\bidbondrefund;
use App\Models\mybidbonds;
use App\Notifications\bidrefundNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class bidbondrevenueRepository{
    public function getList(){
        $bidbonds  = mybidbonds::with('entity','company')->wherebetween('created_at',[Carbon::yesterday(),Carbon::tomorrow()])->wherepaymentstatus('PAID')->whererefunded('PENDING')->get();
         $formated = $bidbonds->map(function($bid){
             return [
                 "id"=>$bid->id,
                 "updated_at"=>$bid->updated_at,
                 "company"=>$bid->company->name."-".$bid->company->regnumber,
                 "tendernumber"=>$bid->tendernumber,
                 "entity"=>$bid->entity->name,
                 "tender_close_date"=>$bid->closing_date,
                 "tender_maturity_date"=>$bid->maturitydate,
                 "validityperiod"=>$bid->validityperiod,
                 "refunddata"=>$bid->refunddata,
                 "refund"=>$bid->refunded,
                 "currency"=>$bid->currency,
                 "amount"=>$bid->amount,
                 "uuid"=>$bid->uuid,
                 "action"=>Carbon::now()->gte(Carbon::parse($bid->maturitydate)) ? "MATURED" :""
             ];
         });
         $grouped = $bidbonds->groupBy('currency');
          $summary =[];
          foreach ($grouped as $key => $value) {
             $summary[] = array("status"=>$key,"total"=>$value->sum('amount'));
          }
         return array("data"=>$formated,'summary'=>$summary);
    }

    public function getReport($from,$to,$currency){
        $bidbonds  = mybidbonds::with('entity','company')
                                ->wherepaymentstatus('PAID')
                                ->wherebetween('created_at',[$from,$to])
                                ->wherecurrency($currency)
                                ->get();
        $formated = $bidbonds->map(function($bid){
            return [
                "id"=>$bid->id,
                "updated_at"=>$bid->updated_at,
                "company"=>$bid->company->name."-".$bid->company->regnumber,
                "tendernumber"=>$bid->tendernumber,
                "entity"=>$bid->entity->name,
                "tender_close_date"=>$bid->closing_date,
                "tender_maturity_date"=>$bid->maturitydate,
                "validityperiod"=>$bid->validityperiod,
                "refunddata"=>$bid->refunddata,
                "refund"=>$bid->refunded,
                "currency"=>$bid->currency,
                "amount"=>$bid->amount,
                "uuid"=>$bid->uuid,
                "action"=>Carbon::now()->gte(Carbon::parse($bid->maturitydate)) ? "MATURED" :Carbon::parse($bid->maturitydate)->diffInDays()."days left"
            ];
        });

        $grouped = $bidbonds->groupBy('currency');
          $summary =[];
          foreach ($grouped as $key => $value) {
             $summary[] = array("status"=>$key,"total"=>$value->sum('amount'));
          }
         return array("data"=>$formated,'summary'=>$summary);
    }

    public function getBid($id){
        return mybidbonds::with('refunddata')->whereid($id)->whereIn('refunded',['APPROVED','PROCESSED'])->first();
    }

    public function requestRefund(Request $request){
        $bid = mybidbonds::whereid($request->id)->whererefunded('PENDING')->first();
        $path = $request->file('requestletter')->store('refundletters','my_files');
        bidbondrefund::create(['mybidbond_id'=>$request->id,'amount'=>$bid->amount,'currency'=>$bid->currency,'name'=>$request->name,'bank'=>$request->bank,'accountnumber'=>$request->accountnumber,'requestedby'=>Auth::guard('admin')->user()->id,'requestedOn'=>Carbon::now(),'requestletter'=>$path]);
        $bid->refunded="AWAITING";
        $bid->save();
        return redirect()->back()->with('successMessage','Bidbond refund request successfully submitted');
    }

    public function approveRefund($id){
        $bid = bidbondrefund::whereid($id)->first();
        $bid->bidbond->refunded ="APPROVED";
        $bid->bidbond->save();
        $bid->authrizedBy = Auth::guard('admin')->user()->id;
        $bid->authorizedOn = Carbon::now();
        $bid->save();
        return redirect()->back()->with('successMessage','Bidbond refund request successfully Approved');

    }

    public function updateRefund(Request $request,$id){

        $bid = bidbondrefund::whereid($id)->first();
        $bid->referencenumber = $request->referencenumber;
        $bid->refundedOn = Carbon::now();
        $bid->bidbond->refunded ="PROCESSED";
        $bid->bidbond->save();
        $bid->refundedOn = $request->refunddate;
        $bid->save();
        try {
            $users = $bid->bidbond->company->users;
            if(count($users)){
            Notification::send($users,new bidrefundNotification($bid->bidbond->company->name,$bid->amount,$bid->bidbond->tendernumber,$bid->bidbond->entity->name,$bid->bank,$bid->accountnumber,$request->refunddate));
            return redirect()->back()->with('successMessage','Bidbond refund request successfully updated');
            } 
        } catch (\Throwable $th) {
            return redirect()->back()->with('successMessage','Bidbond refund request successfully updated');
        }
       
    }
}
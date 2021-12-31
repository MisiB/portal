<?php
namespace App\Repositories\administrator;

use App\Helpers\generalHelper;
use App\Models\company;
use App\Models\suspense;
use App\Models\suspense_receipts;
use App\Models\suspensetransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class wallettransferRepository{

    public function getBalances($id,$accountnumbers){
     $summary =[];
     foreach ($accountnumbers as $key => $value) {
        $data = suspense::with(['suspenseReceipts','company','transfers'=>function($query){
            $query->where("status",'=','PENDING');
        },'transfers.fromCompany','transfers.toCompany','transfers.requestedBy','transfers.approvedBy'])->wherecompany_id($id)->whereaccountnumber($value->accountnumber)->wherecurrency($value->currency)->wherestatus('PENDING')->get();
       if(count($data)>0)
       {
        foreach ($data as $ky => $val) {
            $deposit = $val->amount;
            $receipted = count($val->suspenseReceipts)>0 ? $val->suspenseReceipts->sum("amount") :0;
            $balance = $deposit-$receipted;
             
            $summary[]=array("id"=>$val->id,'accountnumber'=>$value->accountnumber,"currency"=>$value->currency,"transfers"=>$val->transfers,"total"=>$balance);
 
           }
            }
        }

     return $summary;
    }

    public function requestTransfer(Request $request){
        $transfer = suspensetransfer::wheresuspense_id($request->suspense_id)->wherestatus('PENDING')->first();
        if(is_null($transfer)){
             $suspense = suspense::whereid($request->suspense_id)->first();
             $receipted = count($suspense->suspenseReceipts)>0 ? $suspense->suspenseReceipts->sum("amount") :0;
             $balance = $suspense->amount - $receipted;
             $tocompany = $suspense->company_id;
              if(!is_null($request->regnumber)){
                $company = company::whereregnumber($request->regnumber)->first();
                if(!is_null($company)){
                     $tocompany= $company->id;
                }else{
                    return redirect()->back()->with('statusError','Destination company not found'); 
                }
              }
             if($balance>=$request->amount){
                 $filename = $request->file('filename')->store('transfers','my_files');
                 suspensetransfer::create([
                     'suspense_id'=>$request->suspense_id,
                     'from_company_id'=>$suspense->company_id,
                     'to_company_id'=>$tocompany,
                     'amount'=>$request->amount,
                     'accountnumber'=>$request->accountnumber,
                     'filename'=>$filename,
                     'requestedby'=>Auth::guard('admin')->user()->id
                 ]);
               
                 return redirect()->back()->with('statusSuccess','Transfer request successfully submitted');
             }else{
                return redirect()->back()->with('statusError','suspense balance :'.$balance); 
             }
        }else{
            return redirect()->back()->with('statusError','Suspense account has an application awaiting verification');
        }
    }

    public function approveTransfer($id){
        $transfer = suspensetransfer::whereid($id)->wherestatus('PENDING')->first();

        if(!is_null($transfer)){
            $suspense = suspense::whereid($transfer->suspense_id)->first();
            $receipted = count($suspense->suspenseReceipts)>0 ? $suspense->suspenseReceipts->sum("amount") :0;
            $balance = $suspense->amount - $receipted;

            if($transfer->amount <= $balance){
                $helper = new generalHelper();
                $receiptnumber = $helper->get_transfer_number($suspense->company_id);
                $uuid = Str::uuid();
                suspense_receipts::create(['suspense_id'=>$transfer->suspense_id,'uuid'=>$uuid,'receiptnumber'=>$receiptnumber,'currency'=>$suspense->currency,'amount'=>$transfer->amount]);
                if($suspense->amount == $transfer->amount){
                    $suspense->status ='UTILIZED';
                    $suspense->save();
                }

                suspense::create(['banktransaction_id'=>$transfer->id,'source'=>'suspensetransfer','company_id'=>$transfer->to_company_id,'accountnumber'=>$transfer->accountnumber,'currency'=>$suspense->currency,'amount'=>$transfer->amount,'status'=>'PENDING']);
                $transfer->status ="APPROVED";
                $transfer->save();
                return redirect()->back()->with('statusSuccess','Not pending transfer request found');

            }
        }else{
            return redirect()->back()->with('statusError','Not pending transfer request found');
        }

    }
}
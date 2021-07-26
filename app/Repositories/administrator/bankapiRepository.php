<?php
namespace App\Repositories\administrator;

use App\Helpers\generalHelper;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Models\banktransactions;
use App\Models\company;
use App\Models\receipts;
use App\Models\currency;
use App\Models\rtgs;
use App\Models\statement;
use App\Models\suspense_receipts;
use App\Models\tender_invoice;
use App\Repositories\suspenseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\administrator\tenderInvoicesRepository;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Auth;


class bankapiRepository{

    private $suspense;
    private $helper;
    private $supplierinvoicing;
    private $tenderinvoicing;
    private $rtgs;
    public function __construct(suspenseRepository $suspense,generalHelper $helper,supplier_invoicing_Interface $supplierinvoicing,tenderInvoicesRepository $tenderinvoicing,rtgsRepository $rtgs)
    {
      $this->suspense = $suspense;
      $this->helper = $helper;
      $this->supplierinvoicing = $supplierinvoicing; 
      $this->tenderinvoicing = $tenderinvoicing; 
      $this->rtgs = $rtgs;
    }
    public function getList(Request $request){
        return banktransactions::when($request->term,function($query,$term){
            $query->where('description','LIKE','%'.$term.'%');
            $query->orWhere('source_reference','LIKE','%'.$term.'%');
        })->with('company')->orderby('created_at','ASC')->paginate();
    }

    public function getLatest(){
        $transactions = banktransactions::with('company')->whereIn('status',['PENDING','CLAIMED'])->whereDate('created_at',Carbon::now())->get();
        $awaiting  =  banktransactions::with('company')->wherestatus('AWAITING')->get();
        return  array('transactions'=>$transactions,'awaiting'=>$awaiting);
    }
    public function getListByAccount($terms,$currency){
        //$invoice = tender_invoice::whereid($request->inv)->first();
       // $accoutnumber = $this->helper->getAccount($type,$currency);
        //return $accoutnumber;
        return banktransactions::when($terms,function($query,$term){
            $query->where('description','LIKE','%'.$term.'%');
            $query->orWhere('source_reference','LIKE','%'.$term.'%');
        })
        ->wherecurrency($currency) 
        ->whereDate('created_at','>=','2021-01-01')
        ->orderby('created_at','ASC')->get();
    }

    public function update($id,$rtgs_id){
        $transaction = banktransactions::whereid($id)->first();
         $rtgs =  rtgs::whereid($rtgs_id)->first();
	//Log::info($rtgs);
         if(!is_null($rtgs))
         {
              $accountnumbers = $this->helper->get_account_numbers($rtgs->currency->name,$rtgs->type);
              Log::info($accountnumbers); 
             foreach ($accountnumbers as $key =>$accoutnumber) {
             if($accoutnumber->accountnumber == $transaction->accountnumber)
             {
             $customer = !is_null($rtgs) ? $rtgs->company :'';
                if(!is_null($customer))
                {
                if(!is_null($transaction)){
                        if($transaction->status=='PENDING'){
                            $transaction->customer_number = $customer->regnumber;
                            $transaction->status = 'CLAIMED';
                            $transaction->save();
                            $args = array("banktransaction_id"=>$transaction->id,'company_id'=>$customer->id,'accountnumber'=>$transaction->accountnumber,'currency'=>$transaction->currency,'amount'=>$transaction->amount);
                            $this->suspense->captureRecord($args);                            
                            $rtgs->refnumber = $transaction->source_reference;
                            $rtgs->status ='APPROVED';
                            $rtgs->amount = $transaction->amount;
                            $rtgs->user_id = Auth::guard('admin')->user()->id;
                            $rtgs->transdate = $transaction->trans_date;
                            $rtgs->save();
                            return array('status'=>'successMessage','message'=>'Bank transaction Successfully Claimed','data'=>[]);  
                   
                        }else{
                            return array('status'=>'errorMessage','message'=>'Bank transaction already utilized','data'=>[]);  
                        }
                }else{
                    return array('status'=>'errorMessage','message'=>'Bank transaction not found','data'=>[]);
                }
            }else{
                return array('status'=>'errorMessage','message'=>'Customer not found','data'=>[]);  
            }
        }
    }

            return array('status'=>'errorMessage','message'=>'Transaction cannot be used for this type of  invoice','data'=>[]);     
     
    }else{
        return array('status'=>'errorMessage','message'=>'RTGS NO FOUND','data'=>[]);  
     }
    }

  public function create(Request $request){
    $currency = currency::whereid($request->currency)->first();
    $name = !is_null($currency) ? $currency->name : 'ZWL';
    $array=[
        'bank_id'=>$request->bank,
        'description'=>$request->description,
        'trans_date'=>$request->paymentdate,
        'referencenumber'=>$request->referencenumber,
        'source_reference'=>$request->sourcereference,
        'accountnumber'=>$request->accountnumber,
        'currency'=>$name,
        'amount'=>$request->amount,
        'admin_id'=>Auth::guard('admin')->user()->id,
        'status'=>'AWAITING'
    ];
    banktransactions::create($array);

      return array('status'=>'successMessage','message'=>'Transaction successfully created');
  }

  public function approve(Request $request,$id){
      $bank = banktransactions::whereid($id)->first();
      $bank->status =  $request->status;
      $bank->save();
      return array('status'=>'successMessage','message'=>'Transaction successfully Approved');

  }

}
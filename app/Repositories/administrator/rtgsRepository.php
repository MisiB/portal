<?php
namespace App\Repositories\administrator;

use App\Models\rtgs;
use App\Repositories\commands\supplierInvoicesRepository;
use App\Repositories\commands\tenderInvoicesRepository;
use Illuminate\Http\Request;
use Auth;
class rtgsRepository{
   
    private $supplierregistration;
    private $tenderprocessing;

    public function __construct(supplierInvoicesRepository $supplierregistration,tenderInvoicesRepository $tenderprocessing)
    {
     $this->supplierregistration = $supplierregistration;
     $this->tenderprocessing = $tenderprocessing;    
    }

    public function getList($status){
        return rtgs::with('company')
                    ->wherestatus($status)
                    ->orderby('created_at','ASC')
                    ->get()
                    ->map(function($rtg){
                      return[
                          'id'=>$rtg->id,
                          'company'=>!is_null($rtg->company) ? $rtg->company->name : '',
                          'company_id'=>$rtg->company_id,
                          'type'=>$rtg->type,
                          'bank'=>$rtg->bank,
                          'created_at'=>$rtg->created_at->diffForHumans(),
                          'status'=>$rtg->status,
                          'refnumber'=>$rtg->refnumber,
                          'user'=>!is_null($rtg->user) ? $rtg->user->name : '',
                          'path'=>$rtg->filename,
                          'paymentdate'=>$rtg->paymentdate,
                          'transdate'=>$rtg->transdate
                      ];
                    });
    }

    public function update($rtgs_id,$transaction){
        $rtgs = rtgs::whereid($rtgs_id)->first();     
        if(!is_null($rtgs))
        {
            $rtgs->refnumber = $transaction->source_reference;
            $rtgs->status ='APPROVED';
            $rtgs->amount = $transaction->amount;
            $rtgs->user_id = Auth::guard('admin')->user()->id;
            $rtgs->transdate = $transaction->trans_date;
            $rtgs->save();
     
         /*if($rtgs->type=='SUPPLIER'){
              $this->supplierregistration->processRegistration($rtgs->invoice_number);
          }else{
              $this->tenderprocessing->processtenderinvoice($rtgs->invoice_number);
          }*/
             

          return array('status'=>'successMessage','message'=>'rtgs upload successfully approved');
        
        }else{
            return array('status'=>'errorMessage','message'=>'Rtgs not found');
        }
    }

    
}
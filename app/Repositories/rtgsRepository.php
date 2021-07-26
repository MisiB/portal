<?php
namespace App\Repositories;

use App\Interfaces\bankpaymentsInterface;
use App\Interfaces\banktransactionsInterface;
use App\Interfaces\rtgsInterface;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Models\banktransactions;
use App\Models\nonrefundable_invoices;
use App\Models\rtgs;
use App\Models\tender_invoice;
use App\Models\transfers;
use Illuminate\Http\Request;

class rtgsRepository implements rtgsInterface{
    private $invoice;
    private $transactions;
    private $payments;

    public function __construct(supplier_invoicing_Interface $invoice, bankpaymentsInterface $payments, banktransactionsInterface $transactions)
    {
      $this->invoice = $invoice;  
      $this->transactions = $transactions;
      $this->payments = $payments;
    }

    public function uploadtender($company,$request)
    {
        $invoice = tender_invoice::where(['company_id'=>$company->id,'status'=>'PENDING','type'=>$request->type])->get();
        if(count($invoice)>0){
          
         $path = $request->file('proof')->store('proof','my_files');
         rtgs::create(['company_id'=>$company->id,'invoice_number'=>$invoice[0]->invoice_number,'type'=>$request->type,'filename'=>$path,'currency_id'=>$invoice[0]->currency_id,'paymentdate'=>$request->date,'refnumber'=>$request->referencenumber,'name'=>$request->bank]);
         transfers::create(['invoicenumber'=>$invoice[0]->invoice_number,'referencenumber'=>$request->referencenumber]);        
         return  array('status'=>'successMessage','message'=>'Proof of payment succesfully uploaded . If you have  made multiple payments  please click on  add another payment else click on finish'); 
        }else{
            return array('status'=>'errorMessage','message'=>'No pending invoice found');
        }
    }

    public function upload($company,Request $request)
    {
        $invoice = $this->invoice->getInvoice($company);
        
        if(count($invoice)>0)
        {
             $files = $request->file('files');
              for ($i=0; $i <count($files) ; $i++) { 
                  $path = $files[$i]->store('proofs','my_files');
                  $bank = $request->bank[$i];
                  $referencenumber = $request->referencenumber[$i];
                  $date = $request->date[$i];

                  rtgs::create(['company_id'=>$company->id,'invoice_number'=>$invoice[0]->invoice_number,'type'=>'SUPPLIER','filename'=>$path,'currency_id'=>$invoice[0]->currency_id,'paymentdate'=>$date,'refnumber'=>$referencenumber,'name'=>$bank]);
                  transfers::create(['invoicenumber'=>$invoice[0]->invoice_number,'referencenumber'=>$referencenumber]);



              }

              nonrefundable_invoices::whereinvoice_number($invoice[0]->invoice_number)->update(['status'=>'AWAITING']);

              return array('status'=>'successMessage','message'=>'RTGS successfully uploaded . Your invoice has been put on AWAITING status. This means  your payment now awaits manual verifiction this may take time. You can however verify  your payment on your own by obtain  the transaction reference number from the bank');
        }else{
            return array('status'=>'errorMessage','message'=>'No Pending invoices found');
        }
    }

    public function getAwaiting($invoicenumber){
        $transfers = transfers::whereinvoicenumber($invoicenumber)->get();
        $rtgs = rtgs::whereinvoice_number($invoicenumber)->get();
        return array("transfers"=>$transfers,"rtgs"=>$rtgs);
    }
    public function getList($status)
    {
        
    }

    public function getlistByCompany($company)
    {
        
    }

    public function verify($company,$id){
        $transfer = transfers::whereid($id)->wherestatus('PENDING')->first();
        if(!is_null($transfer))
        {
          $response = $this->transactions->claim($transfer->referencenumber,$company);
          if($response['status']=='successMessage')
          {
               $transfer->status ='CLAIMED';
               $transfer->save();
          }
               $response = $this->payments->processAwaiting($company);
               return $response;
        }else{
            return array('status'=>'errorMessage','message'=>'No Transfer Record found');
        }
        


         
    }
    public function update(Request $request,$id,$company){

        if(!transfers::wherereferencenumber($request->referencenumber)->exists())
        {
        $transfer = transfers::whereid($id)->first();
         $transfer->referencenumber = $request->referencenumber;
         $transfer->save();
          $response = $this->transactions->claim($transfer->referencenumber,$company);
          if($response['status']=='successMessage')
          {
               $transfer->status ='CLAIMED';
               $transfer->save();
          }
         $response = $this->payments->processAwaiting($company);
        return $response;
         


         
    }else{
        return array('status'=>'errorMessage','message'=>'Reference Number already in our database');
    }
  }
}
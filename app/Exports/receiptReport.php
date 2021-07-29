<?php

namespace App\Exports;

use App\Models\nonrefundable_invoices;
use App\Repositories\administrator\suspenseRepository;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class receiptReport implements FromArray,WithHeadings
{
    private $from;
    private $to;
    private $currency;
    public function __construct($from,$to,$currency)
    {
        $this->from = $from;
        $this->to = $to;
        $this->currency = $currency;
         
    }
    public function headings(): array
    {
      return [
        'DATE',
        'INVOICE_NUMBER',
        'RECEIPT_NUMBER',             
        'METHOD',        
        'CURRENCY', 
        'AMOUNT'
    ];
    }
    public function array():array
    {
        $repository = new suspenseRepository();
        $data = nonrefundable_invoices::with('receipts')
      ->wherebetween('created_at',[$this->from,$this->to])
     ->wherestatus('PAID')
     ->wherecurrency_id($this->currency)
     ->get();
     $array=[];
     if(count($data)>0){
        $grouped = $data->groupBy('invoice_number');
         foreach ($grouped as $key => $value) {
             foreach ($value[0]->receipts as $ky => $val) {
                 $method=$val->method;
                 if($method=='suspense'){
                     $suspense = $repository->get_suspnse_entry($val->source_id);
                     if(!is_null($suspense)){
                         $method = $suspense->source;
                     }
                 }
                $array[]=array("date"=>$val->created_at,"invoicenumber"=>$key,"receiptnumber"=>$val->receiptnumber,"method"=>$method,"currency"=>$val->currency,"amount"=>$val->amount);
             }
         }
     }
     return $array;
    }
}

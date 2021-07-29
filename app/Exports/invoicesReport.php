<?php

namespace App\Exports;

use App\Models\nonrefundable_invoices;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class invoicesReport implements FromArray,WithHeadings
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
        'COMPANY_REG',
        'INVOICE_NUMBER',      
        'CATEGORY',        
        'CURRENCY', 
        'COST'
    ];
    }
    public function array(): array
    {
      $data = nonrefundable_invoices::with('receipts')
      ->wherebetween('created_at',[$this->from,$this->to])
     ->wherestatus('PAID')
     ->wherecurrency_id($this->currency)
     ->get();

     $array = [];
      if(count($data)>0){
          foreach ($data as $key => $value) {
              $array[]= array("date"=>$value->updated_at,
                            "regnumber"=>!is_null($value->company)?$value->company->regnumber:"",
                            "invoicenumber"=>$value->invoice_number,
                            "category"=>!is_null($value->category)?$value->category->code:"",
                            "currency"=>!is_null($value->currency)?$value->currency->name:"",
                            "amount"=>$value->cost,
          );
          }
      }
     return $array;
    }
}

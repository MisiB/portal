<?php

namespace App\Exports;

use App\Repositories\administrator\revenuereportRepository;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class summaryrevenueReport implements FromArray, WithHeadings
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
        'CURRENCY',
        'COMPANY_REG',
        'TOTAL_INVOICED',
        'TOTAL_RECEIPTED',
        'NUMBER OF CATEGORIES'
    ];
    }
    public function array(): array 
    {
      $repository = new revenuereportRepository();
      return $repository->getReport($this->from,$this->to,$this->currency);        
    }

    public function columnFormats(): array
    {
        return [
            'A' =>'DATE',
            'B' =>'INVOICE_NUMBER',
            'C'=>'CURRENCY',
            'D'=>'COMPANY_REG',
            'E'=>'TOTAL_INVOICED',
            'F'=>'TOTAL_RECEIPTED',
            'G'=>'NUMBER OF CATEGORIES'
        ];
    }
}

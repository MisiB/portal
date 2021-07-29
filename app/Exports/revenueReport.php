<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class revenueReport implements WithMultipleSheets

{
   use Exportable;

    private $startDate;
    private $endDate;
    private $currency;

    public function __construct($startDate,$endDate,$currency)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->currency = $currency; 
    }
    public function  sheets(): array
    {
        $sheets = [];
       $sheets[] = new summaryrevenueReport($this->startDate,$this->endDate,$this->currency);
       $sheets[] = new invoicesReport($this->startDate,$this->endDate,$this->currency);
       $sheets[] = new receiptReport($this->startDate,$this->endDate,$this->currency);
        return $sheets; 
    }
}
 
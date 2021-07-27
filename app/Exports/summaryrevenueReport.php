<?php

namespace App\Exports;

use App\Repositories\administrator\revenuereportRepository;
use Maatwebsite\Excel\Concerns\FromArray;

class summaryrevenueReport implements FromArray
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
    public function array(): array 
    {
      $repository = new revenuereportRepository();
      return $repository->getReport($this->from,$this->to,$this->currency);        
    }
}

<?php
namespace App\Repositories\suppliers;

use App\Interfaces\suppliers\receiptsInterface;
use App\Models\receipts;

class receiptsRepository implements receiptsInterface{
      public function getReceipts($company)
      {
       
        return receipts::wherecompany_id($company->id)->get();
      }

      public function getReceipt($invoicenumber)
      {
        return receipts::whereinvoicenumber($invoicenumber)->get();
      }
}
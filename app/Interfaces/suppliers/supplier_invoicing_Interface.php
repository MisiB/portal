<?php


namespace App\Interfaces\suppliers;


use App\Http\Requests\invoicingRequest;

interface supplier_invoicing_Interface
{
    public function  getInvoice($company);

public function getInvoices($company,$args);
    public function  addItem(invoicingRequest $request,$company);

    public function  removeItem($id);

    public function checkItem($id,$year,$company);

    public function check_invoice_status($invoicenumber);
    
    public function retrieveInvoice($inv);

    public function verifyInvoice($invoicenumber);

   
}

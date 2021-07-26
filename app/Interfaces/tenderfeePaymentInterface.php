<?php
namespace App\Interfaces;

interface tenderfeePaymentInterface{
    public function getPending($company);
    public function getPendingByType($company,$type); 

    public function getAwaiting($company);

    public function getInvoices($company);
    
    public function removeitem($invoicenumber,$company);
}
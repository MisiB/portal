<?php
namespace App\Interfaces\suppliers;

interface receiptsInterface {
    public function getReceipts($company);
    public function getReceipt($receiptnumber);
}
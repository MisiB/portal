<?php

namespace App\Interfaces;

interface suspenseInterface{

    public function getReport();

    public function getReportByid($company);

    public function captureRecord(array $args);

    public function getBalance($company,$accountnumber);
    
    public function getSuspense($company,$accountnumber);

}
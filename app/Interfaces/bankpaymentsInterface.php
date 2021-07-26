<?php

namespace App\Interfaces;

use App\Http\Requests\popuploadRequest;
use App\Models\banktransactions;
use Illuminate\Http\Request;

interface bankpaymentsInterface{
     public function process($company);
   
     public function processAwaiting($company);
     
     public function tenderprocessing($company,$type);
    
}
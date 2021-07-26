<?php


namespace App\Interfaces;


use App\Http\Requests\mobilepaymentsRequest;

interface mobilepaymentsInterface
{
  public function  intitate(mobilepaymentsRequest $request,$company);

  public function confirm($id,$company);

  public function pending($company);
  
  public function checkPending($company);
}

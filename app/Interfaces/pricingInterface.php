<?php


namespace App\Interfaces;


use App\Http\Requests\pricingRequest;

interface pricingInterface
{
  public  function getPrices();

  public function getPrice($locality);

  public function capture(pricingRequest $request);

  public function  delete($id);
}

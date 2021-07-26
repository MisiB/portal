<?php


namespace App\Interfaces;


use App\Http\Requests\internalrateRequest;

interface internalrateInterface
{
  public  function getInternalRates();

  public  function getInternalRate($currency);

  public function  capture(internalrateRequest $request);

  public function  delete($id);
}

<?php


namespace App\Interfaces;


use App\Http\Requests\bankrateRequest;

interface bankrateInterface
{
  public function getRates();

  public function getRate();

  public function capture(bankrateRequest $request);

  public function  delete($id);
}

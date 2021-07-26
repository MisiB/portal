<?php


namespace App\Interfaces;


use App\Http\Requests\currencyRequest;

interface currencyInterface
{
    public  function  getList($status);

    public function getBylocality($status,$company);

    public  function  capture(currencyRequest $request);

    public  function  delete($id);
}

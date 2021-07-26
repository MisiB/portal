<?php


namespace App\Repositories;


use App\Http\Requests\internalrateRequest;
use App\Models\internal_rate;

class internalrateRepository implements \App\Interfaces\internalrateInterface
{

    public function getInternalRates()
    {
        // TODO: Implement getInternalRates() method.
    }

    public function getInternalRate($currency)
    {
      return internal_rate::whereother_id($currency)->orderBy('id','desc')->first();
    }

    public function capture(internalrateRequest $request)
    {
        // TODO: Implement capture() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}

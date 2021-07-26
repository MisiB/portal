<?php


namespace App\Repositories;


use App\Http\Requests\pricingRequest;
use App\Models\pricing;

class pricingRepository implements \App\Interfaces\pricingInterface
{

    public function getPrices()
    {
        return pricing::with('currency')->get();
    }

    public function getPrice($locality)
    {
        return pricing::wherelocality($locality)->wherestatus('CREATED')->orderBy('id','desc')->first();
    }

    public function capture(pricingRequest $request)
    {
        return  pricing::create(['currency_id'=>$request->id,'action'=>$request->action,'locality'=>$request->locality,'price'=>$request->price]);

    }

    public function delete($id)
    {
         $pricing = pricing::whereid($id)->first();
         $pricing->status ='DELETED';
         $pricing->save();
         return $pricing;
    }
}

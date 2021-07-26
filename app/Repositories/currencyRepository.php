<?php


namespace App\Repositories;


use App\Http\Requests\currencyRequest;
use App\Models\currency;

class currencyRepository implements \App\Interfaces\currencyInterface
{

    public function getList($status)
    {
        return !is_null($status) ? currency::wherestatus($status)->get() : currency::get();
    }

    public function getBylocality($status,$company){
        if($company->country === 'Zimbabwe'){
            return !is_null($status) ? currency::wherestatus($status)->get() : currency::get();  
        }else{
          return currency::wherestatus($status)->wherename('USD')->get(); 
        }
    }

    public function capture(currencyRequest $request)
    {
    return  $request->id =='' ? $this->create($request) : $this->update($request);
    }

    public function delete($id)
    {
       $currency = currency::whereid($id)->first();
       $currency->status ='DELETED';
       $currency->save();
    }

    function  create($request){
      return  currency::create($request->only('name'));
    }

    function update($request){
        $currency = currency::whereid($request->id)->first();
        $currency->name = $request->name;
        $currency->save();
        return $currency;
    }
}

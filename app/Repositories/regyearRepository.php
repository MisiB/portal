<?php


namespace App\Repositories;


use App\Http\Requests\regyearRequest;
use App\Models\regyears;
use Carbon\Carbon;

class regyearRepository implements \App\Interfaces\regyearInterface
{

    public function getYears()
    {
        return regyears::get();
    }

    public function getActiveYears()
    {
         return regyears::where('year','>=',Carbon::now()->year)->get();
    }

    public function capture(regyearRequest $request)
    {
          return regyears::create(['year'=>$request->year]);
    }

    public function delete($id)
    {
        $year = regyears::whereid($id)->first();
        $year->status = 'DELETED';
        $year->save();
        return $year;
    }
}

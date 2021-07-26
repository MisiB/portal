<?php
namespace App\Repositories\administrator;

use App\Models\bidbondfee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class establishmentRepository{

    public function getList($status){
        return  bidbondfee::with('currency','user')->wherestatus($status)->get();
    }

    public function create(Request $request){
        $data=[
            'locality'=>$request->locality,
            'validityperiod'=>$request->period,
            'lowerlimit'=>$request->lower,
            'upperlimit'=>$request->upper,
            'currency_id'=>$request->currency,
            'amount'=>$request->price,
            'user_id'=>Auth::guard('admin')->user()->id
        ];
        bidbondfee::create($data);

        return  array('status'=>'successMessage','message'=>'Establishment Fees Successfully Created');
    }


    public function delete($id){
        $fee = bidbondfee::whereid($id)->first();
        $fee->status ='DELETED';
        $fee->save();
        return  array('status'=>'successMessage','message'=>'Establishment Fees Successfully Deleted');

    }

    
}
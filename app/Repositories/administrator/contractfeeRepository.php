<?php
namespace App\Repositories\administrator;

use App\Models\contractfees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class contractfeeRepository{

    public function getList($status){
        return  contractfees::with('user','currency')->wherestatus($status)->get();
    }

    public function create(Request $request){
        $data=[
            'currency_id'=>$request->currency,
            'lower'=>$request->lower,
            'upper'=>$request->upper,
            'amount'=>$request->price,
            'user_id'=>Auth::guard('admin')->user()->id
        ];
        contractfees::create($data);

        return array('status'=>'successMessage','message'=>'Contract Fee successfully created');
    }

    public function delete($id){
        $fee = contractfees::whereid($id)->first();
        $fee->status = 'DELETED';
        $fee->save();
        return array('status'=>'successMessage','message'=>'Contract Fee successfully Deleted');
    }
}
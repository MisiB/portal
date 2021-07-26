<?php
namespace App\Repositories\administrator;

use App\Models\pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class supplierpriceRepository{

    public function getList($status){
        return  pricing::with('user','currency')->wherestatus($status)->get(); 
    }

    public function create(Request $request){
      
        $data=['currency_id'=>$request->currency,'locality'=>$request->locality,'action'=>$request->action,'price'=>$request->price,'user_id'=>Auth::guard('admin')->user()->id];
        pricing::create($data);
        return array('status'=>'successMessage','message'=>'Pricing Successfully Created');

    }

    public function delete($id){
        $pricing = pricing::whereid($id)->first();
        $pricing->status ='DELETED';
        $pricing->save();
        return array('status'=>'successMessage','message'=>'Pricing Successfully Deleted'); 
    }
}
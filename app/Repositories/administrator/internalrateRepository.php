<?php
namespace App\Repositories\administrator;

use App\Models\internal_rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class internalrateRepository{

    public function getList($status){

        return internal_rate::with('basecurrency','othercurrency','user')->wherestatus($status)->get();
    }

    public function create(Request $request){
      internal_rate::create(['base_id'=>$request->base,'other_id'=>$request->other,'value'=>$request->value,'user_id'=>Auth::guard('admin')->user()->id]);
      return array('status'=>'successMessage','message'=>'Successfully Created Internal Rate');

    }

    public function delete($id){
        $rate = internal_rate::whereid($id)->first();
        $rate->status ='DELETED';
        $rate->save();
        return array('status'=>'successMessage','message'=>'Successfully Deleted Internal Rate');
    }
}
<?php
namespace App\Repositories\administrator;

use App\Models\bank_rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bankrateRepository{

    public function getList($status){
        return bank_rate::with('basecurrency','othercurrency','user')->wherestatus($status)->get();
    }

    public function create(Request $request){
         bank_rate::create(['base_id'=>$request->base,'other_id'=>$request->other,'value'=>$request->value,'user_id'=>Auth::guard('admin')->user()->id]);
        return array('status'=>'successMessage','message'=>'Successfully Created Inter bank Rate');
  
      }
  
      public function delete($id){
          $rate = bank_rate::whereid($id)->first();
          $rate->status ='DELETED';
          $rate->save();
          return array('status'=>'successMessage','message'=>'Successfully Deleted Inter Bank Rate');
      }
}
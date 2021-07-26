<?php
namespace App\Repositories\administrator;

use App\Models\spocfees;
use Illuminate\Http\Request;

class spocfeeRepository{
    public function getList($status){
        return spocfees::with('threshold')->wherestatus($status)->get();
    }

    public function create(Request $request){
        spocfees::create(['threshold_id'=>$request->threshold,'value'=>$request->price]);
        return array('status'=>'successMessage','message'=>'Spoc fee successfully Saved');
    }

    public function delete($id){
        $fee = spocfees::whereid($id)->first();
        $fee->status ="DELETED";
        $fee->save();
        return array('status'=>'successMessage','message'=>'Spoc fee successfully Deleted');
    }
}
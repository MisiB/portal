<?php
namespace App\Repositories\administrator;

use App\Models\bidbondcap;
use App\Models\bidbondfee;
use Illuminate\Http\Request;

class bidbondcapRepository{

    public function getList($status){
        return bidbondcap::wherestatus($status)->get();
    }

    public function create(Request $request){
        $data =['value'=>$request->value];
       bidbondcap::create($data);
       return array('status'=>'successMessage','message'=>'Bid Bond Cap Successfully Created'); 
    }

    public function delete($id){
        $cap = bidbondcap::whereid($id)->first();
        $cap->status = 'DELETED';
        $cap->save();
        return array('status'=>'successMessage','message'=>'Bid Bond Cap Successfully Created');
    }
 }
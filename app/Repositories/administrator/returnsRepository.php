<?php
namespace App\Repositories\administrator;

use App\Models\returns;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class returnsRepository{

    public function getList(){
        return returns::with('uploads')->get();
    }

    public function create(Request $request){
      
           $path = $request->file('templateurl')->store('templates','my_files');
           returns::create(['name'=>$request->name,'templateurl'=>$path,'year'=>Carbon::now()->year,'duedate'=>$request->duedate,'user_id'=>Auth::guard('admin')->user()->id]);
          return array('status'=>'successMessage','message'=>'Procurement Return request successfully created');
    }

    public function showlist($id){
        return returns::with('uploads.entity')->whereid($id)->first();
    }

    public function delete($id){
        $return = returns::whereid($id)->first();

        if(count($return->uploads)==0){
            $return->delete();
         
        }else{
            $return->status ='CANCELLED';
            $return->save();
        }
        return array('status'=>'successMessage','message'=>'Procurement Return successfully deleted');
        
    }
}
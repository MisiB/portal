<?php
namespace App\Repositories\administrator;

use App\Models\company;
use App\Models\company_document_comment;
use App\Notifications\documentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class suppliercommentRepository{
     
    public function create(Request $request){


        company_document_comment::create(['company_id'=>$request->company,'comment'=>$request->comment,'user_id'=>Auth::guard('admin')->user()->id]);
        $user = company::whereid($request->company)->with('users')->first();

        Notification::send($user, new documentNotification($request->comment));
        return array('status'=>'successMessage','message'=>'Comment Successfully added');
    }
}
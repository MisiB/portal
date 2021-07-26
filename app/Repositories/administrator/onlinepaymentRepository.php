<?php
namespace App\Repositories\administrator;

use App\Models\onlinepayments;
use Illuminate\Http\Request;

class onlinepaymentRepository{
    public function getList(Request $request){
        return onlinepayments::with('company')->when($request->term,function($query,$term){
            $query->where('company.name','LIKE','%'.$term.'%');
        })->orderby('created_at','ASC')->paginate();
    }
}
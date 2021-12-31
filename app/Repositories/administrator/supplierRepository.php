<?php
namespace App\Repositories\administrator;

use App\Models\company;
use App\Models\company_document_comment;
use App\Models\company_documents;
use App\Models\suppliers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class supplierRepository{

    public function getPending(){
      $suppliers = suppliers::where(['status'=>'PENDING'])
        ->where('expire_year','>=',Carbon::now()->year)
        ->get();
        $grouped = $suppliers->groupby('company_id');
        $new =[];
        $old=[];

         if(count($suppliers)>0){
           foreach ($grouped as $key => $value) {
               if(count($value[0]->company->documentcomments)>0){
                 
                   $old[]= array('id'=>$key,'date'=>$value[0]->created_at->diffForHumans(),'company'=>$value[0]->company->name,'comments'=>$value[0]->documentcomments);
               }else{
                $new[]= array('id'=>$key,'date'=>$value[0]->created_at->diffForHumans(),'company'=>$value[0]->company->name,'comments'=>$value[0]->documentcomments);
               }
           }   
         }

         return array("old"=>$old,"new"=>$new);
    }

    public function getProfile($id){
        $company = company::whereid($id)->first();
        $company = company::with(['registrations.category','registrations'=>function($query){
               $query->where('status','=','PENDING');
        },'documents'=>function($query)use($company){
            $query->whereaccounttype_id($company->accounttype_id);
            $query->wherelocality($company->locality);
        },'documents.company'=>function($query)use($company){
            $query->where('company_id','=',$company->id);
            
        },'documentcomments'])
        ->whereid($id)
        ->first();

        return $company;
    }

    public function getAllbyDate(Request $request){

    }

    public function comment(Request $request){

    }

    public function approve(Request $request){
       $company = company_documents::wherecompany_id($request->id)->update(['status'=>'APPROVED','approved_by'=>Auth::guard('admin')->user()->id]);
        $issuedOn = Carbon::now();
       $suppliers = suppliers::wherecompany_id($request->id)->wherestatus('PENDING')->update(['status'=>'APPROVED','issuedOn'=>$issuedOn]);
    return array('status'=>'success','message'=>'Documents successfully approved');
    }
}
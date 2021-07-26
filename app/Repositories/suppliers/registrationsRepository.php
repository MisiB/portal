<?php
namespace App\Repositories\suppliers;

use App\Interfaces\suppliers\registrationsInterface;
use App\Models\nonrefundable_invoices;
use App\Models\suppliers;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;

class registrationsRepository implements registrationsInterface{

    public function getByCompany($id)
    {
       return suppliers::with('category')->wherecompany_id($id)->where('expire_year','>=',Carbon::now()->year)->get();  
    }

    public function getCertificate($id,$company)
    {
      return  suppliers::with('category','company')->wherecompany_id($company)->whereid($id)->first();
    }

    public function verify($code)
    {
        return  suppliers::with('category','company')->wherecode($code)->first();
    }

    public function change(Request $request){
      $registration = suppliers::whereid($request->registration_id)->first();
      if(!is_null($registration)){
        if($registration->printed == 0){
              $invoice =  nonrefundable_invoices::where(['company_id'=>$registration->company_id,'category_id'=>$registration->category_id,'year'=>$registration->expire_year,'status'=>'PAID'])->first();
              $invoice->category_id = $request->category_id;
              $invoice->save();
             $registration->category_id = $request->category_id;
             $registration->save();
             return array('status'=>'successMessage','message'=>'Category successfully changed');

        }else{
          return array('status'=>'errorMessage','message'=>'You have already downloaded certificate. Therefore cannot be changed');
        }

      }else{
        return array('status'=>'errorMessage','message'=>'Registration not found');
      }
    }
}

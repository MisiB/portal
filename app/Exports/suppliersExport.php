<?php

namespace App\Exports;

use App\Models\suppliers;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class suppliersExport implements FromArray,WithHeadings
{
   

    private $year;

    public function __construct($year)
    {
        $this->year = $year;
        
    }
    public function headings(): array
    {
      return [
       'COMPANY_REG',
        'COMPANY_NAME',  
        'ACCOUNT_TYPE',    
        'CITY',        
        'COUNTRY', 
        'PHONES',
        'EMAILS',
        'ADDRESS',
        'CODE',
        'DESCRIPTION',
        'REG_YEAR',
        'REG_DATE',
        'STATUS'
    ];
    }
    public function array(): array
    {
        $suppliers = suppliers::with('company','company.contacts','category')->where(['expire_year'=>$this->year])->get();
        $array=[];
        if(count($suppliers)>0){
          
            foreach ($suppliers as $key => $value) {
                $name = $value->company->name;
                $regnumber = $value->company->regnumber;
                $accounttype = !is_null($value->company->type) ? $value->company->type->name :'NOT SET';
                $city = $value->company->city;
                $country = $value->company->country;
                $phones = !is_null($value->company->contacts) ? $value->company->contacts->phonenumbers : 'not set';
                $emails = !is_null($value->company->contacts) ? $value->company->contacts->emails : 'not set';
                $address = !is_null($value->company->contacts) ? $value->company->contacts->address : 'not set';
                $code =  $value->category->code;
                $description = $value->category->name;
                $year = $value->expire_year;
                $registrationDate = $value->created_at;
                $status = $value->status;

                $array[]= array("regnumber"=>$regnumber,"name"=>$name,"accounttype"=>$accounttype,"city"=>$city,"country"=>$country,"phones"=>$phones,"emails"=>$emails,"address"=>$address,"code"=>$code,"description"=>$description,"registrationDate"=>$registrationDate,"expire_year"=>$year,"status"=>$status);
            }
        }
        return $array;
    }
}

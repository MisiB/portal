<?php
namespace App\Repositories\suppliers;
use App\Models\procurementnotices;
use App\Helpers\generalEntityHelper;
use Carbon\Carbon;
class noticeRepository{
    private $helper;
    public function __construct(generalEntityHelper $helper)
    {
      $this->helper = $helper;  
    }

    public function getLatest(){

        $notices =  procurementnotices::limit(10)->orderBy('id','desc')->get();
        $array = [];

        if(count($notices)>0){
            foreach ($notices as $key => $value) {
                $active = 'N';
                if(Carbon::parse($value->close_date)->gte(Carbon::now())){
                $active = 'Y';
                }
               if($active =="Y")
               {
               $array[] = array("uuid"=>$value->uuid,'entity'=>$value->entity->name,'title'=>$value->title,'close_date'=>$value->close_date,'close_time'=>$value->close_time,'status'=>$value->status,'active'=>$active);
               }
              }
        }

        return $array;
    }

    public function getList(){

        $notices =  procurementnotices::get();
        $array = [];

        if(count($notices)>0){
            foreach ($notices as $key => $value) {
                $active = 'N';
                if(Carbon::parse($value->close_date)->gte(Carbon::now())){
                $active = 'Y';
                }
             if($active =="Y")
                {

               $array[] = array("uuid"=>$value->uuid,'entity'=>$value->entity->name,'title'=>$value->title,'close_date'=>$value->close_date,'close_time'=>$value->close_time,'status'=>$value->status,'active'=>$active);
               }
 }
        }

        return $array;
    }

    public function show($id){
        $notice =  procurementnotices::with('procurementtype','entity','currency','createdby','publishedby','products.categories.category','classification')->whereuuid($id)->first();  
        $spocfee=0;
        $establishmentfee =0;
        if($notice->procurementtype_id=='2'){
            $spocfee = $this->helper->calculate_spoc($notice->id);
            $establishmentfee = $this->helper->calculate_establishmentfee($notice->id);
        }

        return array('notice'=>$notice,'spoc'=>$spocfee,'establishment'=>$establishmentfee);
    }
}
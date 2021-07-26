<?php


namespace App\Repositories\suppliers;


use App\Helpers\generalHelper;
use App\Interfaces\suppliers\supplier_dashboard_interface;
use Carbon\Carbon;

class dashboard implements  supplier_dashboard_interface
{
    private  $helper;
    public  function  __construct(generalHelper $helper)
    {
        $this->helper = $helper;
    }

    public function index($company)
  {
       $pending_invoices =  [];
       $awaiting_invoices = [];
       $register_categories = [];
       $notifications = [];
       $company = $this->helper->get_company_name();
       $data = compact('pending_invoices','awaiting_invoices','register_categories','notifications','company');
       return $data;
  }
}

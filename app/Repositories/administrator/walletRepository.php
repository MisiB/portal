<?php
namespace App\Repositories\administrator;

use App\Helpers\generalHelper;
use Illuminate\Http\Request;

class walletRepository{


    private $helper;
    private $suspense;

    public function __construct(generalHelper $helper,suspenseRepository $suspense)
    {
        $this->helper = $helper; 
        $this->suspense = $suspense;
    }

    public function get_wallet_by_account($id){
         $accountnumbers = $this->helper->get_accounts();
          $array = [];
         foreach ($accountnumbers as $key => $value) {
             $balance = $this->suspense->getBalance($id,$value->accountnumber);
            $array[] = array("accountnumber"=>$value,"balance"=>$balance);
         }

         return $array;
        

    }
    public function moveFunds(Request $request){
     
        

    }
 }

?>
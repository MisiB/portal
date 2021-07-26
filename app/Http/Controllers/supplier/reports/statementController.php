<?php

namespace App\Http\Controllers\supplier\reports;

use App\Helpers\generalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\statementInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class statementController extends Controller
{
     private $HELPER;
     private $statement;
     
     public function __construct(generalHelper $HELPER, statementInterface $statement)
     {
          $this->HELPER = $HELPER;
          $this->statement = $statement;
     }

     public function index(){
         $company = $this->HELPER->get_company_name();
         $statement = $this->statement->getStatement($company);
         return Inertia::render('Accounts/users/reports/statement',['statements'=>$statement]);
     }

}

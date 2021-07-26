<?php
namespace App\Interfaces;

interface mytenderfeesInterface{

      public function mybindbonds($company);

      public function myadministrationfees($company);

      public function add($request, $company);

      public function delete($id, $company);

}
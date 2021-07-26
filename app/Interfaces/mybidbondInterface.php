<?php 
namespace App\Interfaces;

use App\Http\Requests\bidbondRequest;

interface mybidbondInterface{

    public function getList($company);

    public function capture(bidbondRequest $request,$company);
}
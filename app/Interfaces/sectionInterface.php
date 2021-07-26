<?php


namespace App\Interfaces;


use App\Http\Requests\sectionRequest;

interface sectionInterface
{
 public  function getList($status);

 public function  capture(sectionRequest $request);

 public function  delete($id,$status);
}

<?php


namespace App\Interfaces;


use App\Http\Requests\categoryRequest;

interface categoryInterface
{
 public  function  getList($status);

 public function capture(categoryRequest $request);

 public function delete($id,$status);
}

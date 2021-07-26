<?php


namespace App\Interfaces;


use App\Http\Requests\regyearRequest;

interface regyearInterface
{
   public function  getYears();

   public function  getActiveYears();

   public function  capture(regyearRequest $request);

   public  function  delete($id);
}

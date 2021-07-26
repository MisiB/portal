<?php


namespace App\Interfaces\suppliers;


use Illuminate\Http\Request;

interface supplier_document_upload_Interface
{
  public function  getList($company);

  public function upload(Request $request,$company);

  public function update(Request $request);

  public function  checkDocument($company);
}

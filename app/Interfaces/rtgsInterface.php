<?php
namespace App\Interfaces;

use App\Http\Requests\popuploadRequest;
use Illuminate\Http\Request;

interface rtgsInterface{
    public function upload($company, Request $request);
    
    public function uploadtender($company, popuploadRequest $request);

    public function getList($status);

    public function getlistByCompany($company);

    public function getAwaiting($invoicenumber);

    public function verify($company,$id);

    public function update(Request $request,$id,$company);
}
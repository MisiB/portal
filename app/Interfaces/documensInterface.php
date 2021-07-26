<?php


namespace App\Interfaces;


use App\Http\Requests\documentRequest;

interface documensInterface
{
    public  function getList($accounttype);

    public function add(documentRequest $request);

    public function delete($id);

}

<?php
namespace App\Interfaces\suppliers;

use App\Http\Requests\userRequest;

interface usersInterface{

    public function getList($company);

    public function create(userRequest $request,$company);

    public function update(userRequest $request,$id);


}
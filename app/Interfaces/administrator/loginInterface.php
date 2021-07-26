<?php
namespace App\interfaces\administrator;

use App\Http\Requests\adminchangePasswordRequest;
use App\Http\Requests\adminCreateRequest;
use App\Http\Requests\adminLoginRequest;
use App\Models\administrator;

interface loginInterface{
     public function Login(adminLoginRequest $request);

     public function passwordChange(adminchangePasswordRequest $request,administrator $user);

     public function create(adminCreateRequest $request);

     public function changeStatus($status,administrator $user);
}
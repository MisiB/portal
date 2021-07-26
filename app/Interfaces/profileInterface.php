<?php
namespace App\Interfaces;

use App\Http\Requests\profileCompanyRequest;
use App\Http\Requests\profileUserRequest;

interface profileInterface{
    public function getProfile();

    public function updateUserProfile(profileUserRequest $request);

    public  function  updateCompanyProfile(profileCompanyRequest  $request);

    public  function  deleteProfile($id);
}

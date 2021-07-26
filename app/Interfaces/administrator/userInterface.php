<?php
namespace App\interfaces\administrator;

use App\Http\Requests\adminUserRequest;

interface userInterface{
    public function getList();

    public function create(adminUserRequest $request);

    public function update(adminUserRequest $request,$id);

    public function delete($id);

    public function resetPassword($id);
}

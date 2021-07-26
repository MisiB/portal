<?php
namespace App\interfaces\administrator;

use Illuminate\Http\Request;

interface roleInterface{

    public function getList();
    
    public function getRoleBylevel($level);

    public function add(Request $request);

    public function update(Request $request,$id);

    public function delete($id);
}
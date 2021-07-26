<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\permissionRepository;
use Illuminate\Http\Request;

class permissionsController extends Controller
{
    private $permission;

    public function __construct(permissionRepository $permission)
    {
        $this->permission = $permission;
    }
    
    public function store(Request $request)
    {
         $request->validate(['name'=>'required','value'=>'required|unique:permissions,id']);
         $response = $this->permission->create($request);
         return redirect()->back()->with($response['status'],$response['message']);
    }

   
    public function show($id)
    {
         $permissions = $this->permission->getList($id);
         return redirect()->back()->with('permissions',$permissions);

    }

   
    public function destroy($id)
    {
        $response = $this->permission->delete($id);
        return redirect()->back()->with($response['status'],$response['message']);  
    }
}

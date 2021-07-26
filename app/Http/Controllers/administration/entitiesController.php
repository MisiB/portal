<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\interfaces\administrator\roleInterface;
use App\Repositories\administrator\entityRepository;
use App\Repositories\administrator\procurementclassRepository;
use App\Repositories\administrator\roleRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class entitiesController extends Controller
{

    private $entity;
    private $procurementclass;
    private $roles;
    public function __construct(entityRepository $entity,procurementclassRepository $procurementclass,roleRepository $roles)
    {
        $this->entity = $entity; 
        $this->procurementclass = $procurementclass;
        $this->roles = $roles;
    }
   
    public function index(Request $request)
    {
      $entitylist = $this->entity->getList($request);
      $classlist = $this->procurementclass->getList('CREATED');
      $roles = $this->roles->getRoleBylevel('entity');
      return  Inertia::render('Accounts/administrator/entity/index',compact('entitylist','classlist','roles'));
    }

    
    public function store(Request $request)
    {
         $request->validate(['name'=>'required','slug'=>'required','city'=>'required','province'=>'required','district'=>'required','sector'=>'required','procurementclass'=>'required']);

         $response = $this->entity->create($request);
         return redirect()->back()->with($response['status'],$response['message']);
    }


   
    public function destroy($id)
    {
        //
    }
}

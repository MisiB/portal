<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\roleRequest;
use App\Interfaces\administrator\roleInterface;
use App\Models\roles;
use App\Repositories\administrator\moduleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class roleController extends Controller
{
   private $role;

   public function __construct(roleInterface $role)
   {
       $this->role = $role;
   }
    public function index()
    {
       $roles = $this->role->getList();
       return  Inertia::render('Accounts/administrator/roles/index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $response = $this->role->add($request);
        return redirect()->back()->with($response['status'],$response['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(roleRequest $request, $id)
    {
             
       $response = $this->role->update($request,$id);
       return redirect()->route('roles.index')->with($response['status'],$response['message']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->role->delete($id);
        return redirect()->route('roles.index')->with($response['status'],$response['message']);
    }
}

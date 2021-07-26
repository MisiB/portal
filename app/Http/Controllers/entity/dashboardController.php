<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\entity\procurementnoticeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class dashboardController extends Controller
{
    private $notices;

    public function __construct(procurementnoticeRepository $notices)
    {
     $this->notices = $notices;    
    }
    public function index()
    {
        $user = User::with('entity')->whereid(Auth::user()->id)->first();
        $entity = $user->entity;
        $notices = $this->notices->getList();
        return Inertia::render('Accounts/entity/dashboard',compact('entity','notices'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

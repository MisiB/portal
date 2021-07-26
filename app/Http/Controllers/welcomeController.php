<?php

namespace App\Http\Controllers;

use App\Repositories\suppliers\noticeRepository;
use App\Repositories\suppliers\activesuppliersRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class welcomeController extends Controller
{
    private $notices;

    public function __construct(noticeRepository $notices,activesuppliersRepository $suppliers)
    {
        $this->notices = $notices;
        $this->suppliers = $suppliers;
    }
     public  function  index(){

        $notices = $this->notices->getLatest();
         return  Inertia::render('welcome',compact('notices'));
     }

     public  function  tenders(){
         $tenders = $this->notices->getList();
         return Inertia::render('tenders/list',['notices'=>$tenders]);
     }

     public  function  awards(){
         $awards =[];
         return Inertia::render('tenders/list',['awards'=>$awards]);
     }
     
     public function show($uuid){
         $response = $this->notices->show($uuid);
         $notice = $response['notice'];
         $spoc = $response['spoc'];
         $establishment = $response['establishment'];
         return Inertia::render('tenders/show',compact('notice','spoc','establishment'));
     }
     public  function  suppliers(){
         $categories= $this->suppliers->getList();
         return Inertia::render('registered/list',compact('categories'));
     }

     public function showlist($id){
        $suppliers= $this->suppliers->showlist($id);
         return Inertia::render('registered/show',compact('suppliers'));  
     }
}

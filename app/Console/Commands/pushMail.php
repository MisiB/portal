<?php

namespace App\Console\Commands;

use App\Imports\mailList;
use App\Mail\workshop;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class pushMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command pushes bulk emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $users = User::get();
      
     
         if(count($users)>0)
         {
             Mail::to("mutemachimwea@praz.org.zw")->queue(new workshop());
             foreach ($users as $key => $value) {
                if (filter_var($value->email, FILTER_VALIDATE_EMAIL)) 
                {
                Mail::to($value->email)->queue(new workshop());
                Log::info("email send to:".$value->email);
                }
             }
          
               
             
         }
    }
}

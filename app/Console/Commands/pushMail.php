<?php

namespace App\Console\Commands;

use App\Imports\mailList;
use App\Mail\workshop;
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
        $name = $this->ask("filename");
        $data = Excel::toArray(new mailList,$name);
     
         if(count($data[0])>0)
         {
             for ($i=0; $i <count($data[0]) ; $i++) { 
                 Mail::to($data[0][$i][0])->queue(new workshop());
                 Log::info("email send to:".$data[0][$i][0]);
             }
         }
           }
}

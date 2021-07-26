<?php

namespace App\Console\Commands;

use App\Models\suppliers;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class generateuuid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:uuid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command generates uuids';

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
         $suppliers = suppliers::whereexpire_year('2021')->get();
        
         if(count($suppliers)>0){
             foreach ($suppliers as $key => $value) {
                 if(is_null($value->uuid))
                 {
                   Log::info($value);
                  $value->uuid = Str::uuid();
                  $value->save();
                 }
             }
         }
    }
}

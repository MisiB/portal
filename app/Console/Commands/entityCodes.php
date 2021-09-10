<?php

namespace App\Console\Commands;

use App\Models\entity;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class entityCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:entity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command generates regnumber for entities';

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
       $list = entity::get();

       foreach ($list as $key => $value) {
           $id ="";
           if($value->id <10){
               $id = "0".$value->id;
           }else{
               $id =$value->id;
           }
          $code = "PE-".Carbon::now()->year."-".$id;
          if(is_null($value->regnumber)){
              $value->regnumber = $code;
              $value->save();
              Log::info($value->name."-".$code);
          }
       }
    }
}

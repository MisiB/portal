<?php

namespace App\Console\Commands;

use App\Exports\suppliersExport;
use App\Models\suppliers;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel as MaatwebsiteExcel;

class supplierlist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'suppliers:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command exports list of suppliers ';

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
        $year = $this->ask("year");
          $filename = Carbon::now()->day.'-'.Carbon::now()->month.'-'.Carbon::now()->year.'.xlsx';
          MaatwebsiteExcel::store(new suppliersExport($year),$filename,'my_files');

    }
}

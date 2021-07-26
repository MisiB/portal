<?php

namespace App\Console;

use App\Console\Commands\processingAwaitingInvoice;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\palladium;
use App\Console\Commands\backupDatabase;
use App\Console\Commands\generateuuid;
use App\Console\Commands\importStatement;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        processingAwaitingInvoice::class,
        palladium::class,
        backupDatabase::class,
        generateuuid::class,
        importStatement::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

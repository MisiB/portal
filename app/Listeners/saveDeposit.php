<?php

namespace App\Listeners;

use App\Events\processDeposit;
use App\Helpers\generalHelper;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class saveDeposit implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  processDeposit  $event
     * @return void
     */
    public function handle(processDeposit $event)
    {
        $transaction = $event->transaction;
      $HELPER = new generalHelper();
      
      /// get non refundable 
    }
}

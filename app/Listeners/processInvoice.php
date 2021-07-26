<?php

namespace App\Listeners;

use App\Events\ChecknonrefundableInvoices;
use App\Helpers\generalHelper;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Repositories\suppliers\supplier_invoicing_Repository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class processInvoice implements ShouldQueue
{
    private  $invoice;
    public function __construct(supplier_invoicing_Interface $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Handle the event.
     *
     * @param  ChecknonrefundableInvoices  $event
     * @return void
     */
    public function handle(ChecknonrefundableInvoices $event)
    {
         $transaction = $event->transaction;     

    }
}

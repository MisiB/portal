<?php

namespace App\Console\Commands;

use App\Helpers\generalHelper;
use App\Models\nonrefundable_invoices;
use App\Models\suspense_receipts;
use App\Models\receipts;
use App\Models\rtgs;
use App\Models\statement;
use App\Models\tender_invoice;
use App\Repositories\commands\tenderInvoicesRepository;
use App\Repositories\commands\supplierInvoicesRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class processingAwaitingInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:awaiting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process awaiting invoices';

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
       $commandHelper = new supplierInvoicesRepository();
       $tendercommandHelper  = new tenderInvoicesRepository();
       $commandHelper->getList();  
       $tendercommandHelper->getList();
          

    }
}

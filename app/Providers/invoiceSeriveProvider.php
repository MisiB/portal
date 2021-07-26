<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\invoicePDF;
class invoiceSeriveProvider extends ServiceProvider
{
   protected $defer = true;
    public function register()
    {
        $this->app->bind(invoicePDF::class,function($app){
            return new invoicePDF($app['config']['dompdf']);
        });
    }


    public function boot()
    {
        return [invoicePDF::class];
    }
}

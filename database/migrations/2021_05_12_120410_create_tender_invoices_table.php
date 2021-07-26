<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('invoice_number');
            $table->string('tendernumber');
            $table->string('type');
            $table->string('description');
            $table->integer('currency_id');
            $table->integer('year');
            $table->integer('amount');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tender_invoices');
    }
}

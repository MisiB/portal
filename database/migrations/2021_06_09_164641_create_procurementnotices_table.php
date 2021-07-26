<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcurementnoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurementnotices', function (Blueprint $table) {
            $table->id();
            $table->integer('entity_id');
            $table->string('uuid');
            $table->string('title');
            $table->text('description');
            $table->string('close_date');
            $table->string('close_time');
            $table->string('currency_id');
            $table->string('bidvalue');
            $table->string('bidsecurity')->nullable();
            $table->string('site_visit_date')->nullable();
            $table->string('site_visit_location')->nullable();
            $table->integer('procurementtype_id');
            $table->string('instructions');
            $table->string('noticetype');
            $table->integer('created_by');
            $table->integer('limit');
            $table->integer('validityperiod')->nullable();
            $table->integer('published_by')->nullable();
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('procurementnotices');
    }
}

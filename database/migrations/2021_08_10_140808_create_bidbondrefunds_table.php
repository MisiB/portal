<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidbondrefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidbondrefunds', function (Blueprint $table) {
            $table->id();
            $table->integer('mybidbond_id');
            $table->string('amount');
            $table->string('currency');
            $table->string('name'); 
            $table->string('bank'); 
            $table->string('accountnumber');
            $table->integer('requestedby');
            $table->string('requestedOn');
            $table->integer('authrizedBy')->nullable();
            $table->string('authorizedOn')->nullable();
            $table->string('requestletter');
            $table->string('refundedOn')->nullable();
            $table->string('referencenumber')->nullable();
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
        Schema::dropIfExists('bidbondrefunds');
    }
}

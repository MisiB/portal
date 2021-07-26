<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractfeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractfees', function (Blueprint $table) {
            $table->id();
            $table->integer('currency_id');
            $table->string('lower');
            $table->string('upper');
            $table->string('amount');
            $table->integer('user_id');
            $table->string('status')->default('CREATED');
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
        Schema::dropIfExists('contractfees');
    }
}

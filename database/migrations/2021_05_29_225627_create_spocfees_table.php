<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpocfeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spocfees', function (Blueprint $table) {
            $table->id();
            $table->integer('threshold_id');
            $table->string('locality');
            $table->integer('currency_id');
            $table->string('value');
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
        Schema::dropIfExists('spocfees');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMybidbondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mybidbonds', function (Blueprint $table) {
            $table->id();
            $table->string('tendernumber');
            $table->integer('company_id');
            $table->string('closing_date');
            $table->string('validityperiod');
            $table->string('maturitydate');
            $table->string('extension')->nullable();
            $table->string('refunded')->default('PENDING');
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
        Schema::dropIfExists('mybidbonds');
    }
}

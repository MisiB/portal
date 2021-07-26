<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rtgs', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('invoice_number');
            $table->string('type');
            $table->string('filename');
            $table->integer('currency_id')->nullable();
            $table->string('amount');
            $table->string('name');
            $table->string('paymentdate');
            $table->string('status')->default('PENDING');
            $table->text('comment')->nullable();
            $table->string('refnumber')->nullable();
            $table->string('transdate')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('rtgs');
    }
}

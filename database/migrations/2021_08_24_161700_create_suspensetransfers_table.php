<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspensetransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspensetransfers', function (Blueprint $table) {
            $table->id();
            $table->integer('suspense_id');
            $table->integer('from_company_id');
            $table->integer('to_company_id');
            $table->string('amount');
            $table->string('accountnumber');
            $table->string('filename');
            $table->integer('requestedby');
            $table->integer('approvedby')->nullable();
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
        Schema::dropIfExists('suspensetransfers');
    }
}

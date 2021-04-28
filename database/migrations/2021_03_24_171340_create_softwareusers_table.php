<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('softwareusers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('software_id');
            $table->string('employee_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('sstatus')->nullable();
            $table->date('payment_date')->nullable();
            $table->date('renewal_date')->nullable();
            $table->string('credit_card')->nullable();
            $table->string('credit_holder')->nullable();
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
        Schema::dropIfExists('softwareusers');
    }
}

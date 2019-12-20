<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablesToEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('company')->after('email')->nullable();
            $table->string('designation')->after('company')->nullable();
            $table->string('ipAddress')->after('designation'->nullable());
            $table->string('country')->after('region')->nullable();
            $table->string('cover_image')->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('company');
            $table->dropColumn('designation');
            $table->dropColumn('ipAddress');
            $table->dropColumn('country');
            $table->dropColumn('cover_image');
        });
    }
}

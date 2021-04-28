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
            $table->string('company_id')->after('email')->nullable();
            $table->string('department_id')->after('company_id')->nullable();
            $table->string('designation_id')->after('department_id')->nullable();
            $table->string('ipaddress_id')->after('designation_id')->nullable();
            $table->string('country_id')->after('region')->nullable();
            $table->string('cover_image')->after('gender')->nullable();
            $table->integer('user_id')->after('cover_image');
            $table->integer('status')->after('user_id');
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
            $table->dropColumn('company_id');
            $table->dropColumn('department_id');
            $table->dropColumn('designation_id');
            $table->dropColumn('ipaddress_id');
            $table->dropColumn('country_id');
            $table->dropColumn('cover_image');
            $table->dropColumn('user_id');
        });
    }
}

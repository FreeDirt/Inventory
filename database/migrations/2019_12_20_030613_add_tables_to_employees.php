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
            $table->string('company')->nullable()->after('email');
            $table->string('designation')->nullable()->after('company');
            $table->string('ipAddress')->nullable()->after('designation');
            $table->string('country')->nullable()->after('region');
            $table->string('cover_image')->after('gender');
            $table->integer('user_id')->after('cover_image');
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
            $table->dropColumn('user_id');
        });
    }
}

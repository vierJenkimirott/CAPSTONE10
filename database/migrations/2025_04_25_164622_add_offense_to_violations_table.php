<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('violations', function (Blueprint $table) {
            $table->string('offense')->after('severity'); // Add the offense column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('violations', function (Blueprint $table) {
            $table->dropColumn('offense'); // Rollback the offense column
        });
    }
};
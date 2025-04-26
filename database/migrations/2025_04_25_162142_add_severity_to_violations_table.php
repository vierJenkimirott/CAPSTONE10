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
        $table->string('severity')->after('violation_type_id'); // Add the severity column
        $table->string('offense')->after('severity');
    });
}

public function down()
{
    Schema::table('violations', function (Blueprint $table) {
        $table->dropColumn('severity'); // Rollback the severity column
        $table->dropColumn('offense');
    });
}
};

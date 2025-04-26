<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('educators', function (Blueprint $table) {
            $table->id('educator_id');
            $table->string('user_id', 20);
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->char('middle_initial', 1)->nullable();
            $table->string('suffix', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educators');
    }
};

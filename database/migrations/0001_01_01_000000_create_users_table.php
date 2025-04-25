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
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 20)->primary();
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->string('m_initial', 1)->nullable();
            $table->string('suffix', 10)->nullable();
            $table->string('email', 100)->unique();
            $table->enum('role', ['admin', 'training', 'educator', 'student']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('password', 60);  // For bcrypt hash
            $table->boolean('is_temp_password')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();  // For "remember me" functionality
            $table->timestamps();
            $table->softDeletes();  // For soft deletion

            // Add indexes for frequently queried columns
            $table->index(['lname', 'fname']);
            $table->index('role');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}; 
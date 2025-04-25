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

        //BEHAVIOR ANALYTICS
        // This table stores the behavior analytics data for students.
        Schema::create('behavior_analytics', function (Blueprint $table) {
            $table->id('analytics_id');
            $table->string('student_id', 50);
            $table->text('data_summary')->nullable();
            $table->binary('pie_chart')->nullable();
            $table->binary('line_graph')->nullable();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });


        //BEHAVIOR DATA
        // This table stores the behavior data for students.
        // For example: A student has a pie chart and line graph representing their behavior data.
        Schema::create('behavior_data', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 50);
            $table->string('metric_name', 100);
            $table->integer('metric_value');
            $table->date('recorded_at');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });
        //BEHAVIOR METRICS
        // This table stores the behavior metrics for students.
        // For example: A student has a pie chart and line graph representing their behavior data.
        Schema::create('behavior_metrics', function (Blueprint $table) {
            $table->id();
            $table->string('metric_name', 100);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the tables in reverse order of creation
        Schema::dropIfExists('behavior_analytics');
        Schema::dropIfExists('behavior_data');
        Schema::dropIfExists('behavior_metrics');
    }
};

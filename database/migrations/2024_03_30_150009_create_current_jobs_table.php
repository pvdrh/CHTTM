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
        Schema::create('current_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('category_id');
            $table->integer('company_id');
            $table->integer('salary_from')->nullable();
            $table->integer('salary_to')->nullable();
            $table->float('experience')->nullable();
            $table->float('gpa_from')->nullable();
            $table->integer('job_type')->nullable(); // 0: full-time, 1: part-time, 2: hybrid, 3: remote
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_jobs');
    }
};

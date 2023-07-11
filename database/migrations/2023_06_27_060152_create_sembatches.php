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
        Schema::create('sembatches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('dept_id');
            $table->unsignedBigInteger('prog_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('sem_id');
            $table->string('next_batch')->nullable();
            $table->string('prev_batch')->nullable();
            $table->timestamps();
            
            $table->foreign('dept_id')->references('id')->on('department');
            $table->foreign('prog_id')->references('id')->on('programme');
            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('sem_id')->references('id')->on('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sembatches');
    }
};

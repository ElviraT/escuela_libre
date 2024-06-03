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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_day');
            $table->unsignedBigInteger('id_teacher');
            $table->time('start_hour');
            $table->time('end_hour');
            $table->timestamps();

            $table->foreign('id_day')->references('id')->on('days');
            $table->foreign('id_teacher')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};

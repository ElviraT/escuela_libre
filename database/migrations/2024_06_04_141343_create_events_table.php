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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('color')->nullable();
            $table->unsignedBigInteger('id_day');
            $table->time('startime');
            $table->time('endtime');
            $table->string('freq')->default('weekly');
            $table->integer('interval')->default('1');
            $table->date('startRecur');
            $table->date('endRecur');
            $table->unsignedBigInteger('id_teacher');
            $table->unsignedBigInteger('id_matter');
            $table->timestamps();

            $table->foreign('id_day')->references('id')->on('days');
            $table->foreign('id_teacher')->references('id')->on('teachers');
            $table->foreign('id_matter')->references('id')->on('matters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

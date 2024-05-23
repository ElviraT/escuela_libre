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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('idSex');
            $table->unsignedBigInteger('idStatus');
            $table->unsignedBigInteger('idMaritalState');
            $table->string('register')->unique();
            $table->string('ncolegio')->unique();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('idStatus')->references('id')->on('statuses');
            $table->foreign('idSex')->references('id')->on('sexes');
            $table->foreign('idMaritalState')->references('id')->on('marital_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
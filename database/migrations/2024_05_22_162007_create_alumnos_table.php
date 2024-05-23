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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_representative');
            $table->unsignedBigInteger('id_gender');
            $table->unsignedBigInteger('id_relation');
            $table->string('name');
            $table->string('last_name');
            $table->string('dni')->nullable();
            $table->string('birthdate');
            $table->string('type_blood');
            $table->boolean('alergy');
            $table->string('type_alergy');
            $table->timestamps();

            $table->foreign('id_representative')->references('id')->on('representatives');
            $table->foreign('id_gender')->references('id')->on('sexes');
            $table->foreign('id_relation')->references('id')->on('relation_ships');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
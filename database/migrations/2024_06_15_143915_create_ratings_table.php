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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_teacher');
            $table->unsignedBigInteger('id_student');
            $table->unsignedBigInteger('id_matter');
            $table->unsignedBigInteger('id_grade');
            $table->unsignedBigInteger('id_group');
            $table->float('rating', 10, 2);
            $table->string('comment', 255);

            $table->timestamps();

            $table->foreign('id_teacher')->references('id')->on('teachers');
            $table->foreign('id_student')->references('id')->on('alunmos');
            $table->foreign('id_matter')->references('id')->on('matters');
            $table->foreign('id_grade')->references('id')->on('grades');
            $table->foreign('id_group')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};

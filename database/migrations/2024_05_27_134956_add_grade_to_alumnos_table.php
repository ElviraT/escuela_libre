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
        Schema::table('alumnos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_grade')->after('id_user');
            $table->unsignedBigInteger('id_modality')->after('id_grade');

            $table->foreign('id_grade')->references('id')->on('grades');
            $table->foreign('id_modality')->references('id')->on('modalities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumnos', function (Blueprint $table) {
            //
        });
    }
};

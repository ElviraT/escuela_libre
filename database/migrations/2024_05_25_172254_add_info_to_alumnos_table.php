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
            $table->string('registration')->after('type_blood')->nullable();
            $table->unsignedBigInteger('id_user')->after('registration');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_group')->after('id_user')->nullable();
            $table->foreign('id_group')->references('id')->on('groups');
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
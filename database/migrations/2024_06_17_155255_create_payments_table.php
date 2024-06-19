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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bank');
            $table->unsignedBigInteger('id_representative');
            $table->unsignedBigInteger('id_user');
            $table->decimal('monto', 10, 2);
            $table->string('reference');
            $table->string('payment_date');
            $table->timestamps();

            $table->foreign('id_bank')->references('id')->on('banks');
            $table->foreign('id_representative')->references('id')->on('representatives');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

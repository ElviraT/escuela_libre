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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('description');
            $table->double('monto', 10, 2);
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bank');
            $table->unsignedBigInteger('id_method');
            $table->string('payment_date');
            $table->timestamps();

            $table->foreign('id_bank')->references('id')->on('banks');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_status')->references('id')->on('statuses');
            $table->foreign('id_method')->references('id')->on('method_payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

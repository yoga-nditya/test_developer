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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->char('transaction_number', 16)->nullable();
            $table->unsignedBigInteger('marketing_id')->nullable();
            $table->foreign('marketing_id')->references('id')->on('marketings')->cascadeOnDelete();
            $table->timestamp('date')->nullable();
            $table->integer('cargo_fee')->nullable();
            $table->integer('total_balance')->nullable();
            $table->integer('grand_total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};

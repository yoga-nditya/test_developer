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
        Schema::create('kredits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penjualan_id');
            $table->unsignedBigInteger('marketing_id');
            $table->foreign('penjualan_id')->references('id')->on('penjualans')->cascadeOnDelete();
            $table->foreign('marketing_id')->references('id')->on('marketings')->cascadeOnDelete();
            $table->integer('cicilan')->default(0);
            $table->timestamp('jatuh_tempo');
            $table->integer('jumlah_yang_harus_dibayar')->nullable(); 
            $table->string('status_pembayaran')->default('belum lunas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kredits');
    }
};

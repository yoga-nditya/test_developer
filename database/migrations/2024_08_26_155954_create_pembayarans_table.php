<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kredit_id')->constrained()->onDelete('cascade');
            $table->decimal('jumlah_pembayaran', 15, 2);
            $table->timestamp('tanggal_pembayaran');
            $table->string('metode_pembayaran');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}


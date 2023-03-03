<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggalpesanan');
            $table->foreignId('kdproduk');
            $table->integer('jmlpesanan');
            $table->integer('harga');
            $table->enum('statuspesanan',['tunda','batal','dikemas','dikirim','diterima']);
            $table->enum('statuspembayaran',['belum bayar','bayar']);
            $table->enum('tipepembayaran',['transfer','cod']);
            $table->text('buktipembayaran');
            $table->foreignId('idmember');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};

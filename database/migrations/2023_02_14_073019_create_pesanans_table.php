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
            $table->text('slug')->unique();
            $table->foreignId('kdproduk');
            $table->foreignId('idmember');
            $table->string('kode_inv',45)->unique();
            $table->integer('jmlpesanan');
            $table->integer('harga');
            $table->dateTime('tanggalpesanan');
            $table->enum('statuspesanan',['tunda','batal','dikemas','dikirim','diterima']);
            $table->enum('statuspembayaran',['belum bayar','bayar']);
            $table->enum('tipepembayaran',['transfer','cod'])->nullable();
            $table->text('buktipembayaran')->nullable();
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

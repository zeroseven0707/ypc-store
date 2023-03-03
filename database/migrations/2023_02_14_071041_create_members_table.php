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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk',20)->nullable();
            $table->string('nama',45)->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp',13)->nullable();
            $table->enum('jk',['l','p'])->nullable();
            $table->enum('status_aktif',[1,0])->default(0);
            $table->text('foto')->nullable();
            $table->foreignId('iduser');
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
        Schema::dropIfExists('members');
    }
};

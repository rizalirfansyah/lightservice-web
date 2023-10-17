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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nomor_servis')->nullable();
            $table->dateTime('tanggal_masuk')->nullable();
            $table->string('jenis_gadget');
            $table->string('tipe_gadget');
            $table->string('kelengkapan');
            $table->string('kerusakan');
            $table->string('password_device');
            $table->string('status');
            $table->integer('garansi');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('repairs');
    }
};

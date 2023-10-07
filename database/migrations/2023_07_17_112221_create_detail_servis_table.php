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
        Schema::create('detail_servis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perbaikan_servis_id')->unsigned();
            $table->foreign('perbaikan_servis_id')->references('id')->on('repairs');
            $table->dateTime('tanggal_input')->nullable();
            $table->string('kerusakan_servis')->nullable();
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
        Schema::dropIfExists('detail_servis');
    }
};

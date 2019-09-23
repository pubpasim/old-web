<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDetjadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detjadwal', function (Blueprint $table) {
            $table->increments('id_detjadwal');
            $table->integer('id_jadwal')->unsigned();
            $table->integer('id_angkatan')->unsigned();
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('id_angkatan')->references('id_angkatan')->on('tb_angkatan');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('tb_jadwal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detjadwal');
    }
}

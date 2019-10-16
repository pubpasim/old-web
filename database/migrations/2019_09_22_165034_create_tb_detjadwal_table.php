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
            $table->integer('id_periode')->unsigned();
            $table->integer('id_daerah')->unsigned();
            $table->string('tanggal_awal');
            $table->string('tanggal_akhir');
            $table->string('waktu');
            $table->integer('id_sekolah')->unsigned();
            $table->string('alamat');
            $table->timestamps();
            $table->foreign('id_jadwal')->references('id_jadwal')->on('tb_jadwal');
            $table->foreign('id_periode')->references('id_periode')->on('tb_periode');
            $table->foreign('id_daerah')->references('id_daerah')->on('tb_daerah');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('tb_sekolah');

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

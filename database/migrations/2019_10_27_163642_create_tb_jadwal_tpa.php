<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbJadwalTpa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jadwal_tpa', function (Blueprint $table) {
            $table->increments('id_jad_tpa');
            $table->integer('id_periode')->unsigned();
            $table->integer('id_daerah')->unsigned();
            $table->string('tanggal');
            $table->string('waktu');
            $table->integer('id_sekolah')->unsigned();
          
            $table->timestamps();
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
        Schema::dropIfExists('tb_jadwal_tpa');
    }
}

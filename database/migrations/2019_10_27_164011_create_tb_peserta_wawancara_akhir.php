<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPesertaWawancaraAkhir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_peserta_wawancara_akhir', function (Blueprint $table) {
            $table->increments('id_pesera_wawancara_akhir');
            $table->integer('id_periode')->unsigned();
            $table->string('peserta');
            $table->integer('id_daerah')->unsigned();
            $table->integer('id_sekolah')->unsigned();
            $table->string('hari');
            $table->string('tanggal');
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
        Schema::dropIfExists('tb_peserta_wawancara_akhir');
    }
}

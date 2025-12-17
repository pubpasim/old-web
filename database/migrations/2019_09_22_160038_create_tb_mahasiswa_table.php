<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->increments('id_mahasiswa');
            $table->string('');
            $table->integer('id_angkatan')->unsigned();
            $table->integer('id_sekolah')->unsigned();
            $table->integer('id_daerah')->unsigned();
            $table->string('nama');
            $table->integer('id_orgppmb')->unsigned();
            $table->integer('id_orgpub')->unsigned();
            $table->integer('id_jur')->unsigned();
            $table->integer('id_statuspub')->unsigned();
            $table->integer('id_statussos')->unsigned();
            $table->timestamps();

            $table->foreign('id_angkatan')->references('id_angkatan')->on('tb_angkatan');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('tb_sekolah');
            $table->foreign('id_daerah')->references('id_daerah')->on('tb_daerah');
            $table->foreign('id_orgppmb')->references('id_orgppmb')->on('tb_orgppmb');
            $table->foreign('id_orgpub')->references('id_orgpub')->on('tb_orgpub');
            $table->foreign('id_jur')->references('id_jur')->on('tb_jurusan');
            $table->foreign('id_statuspub')->references('id_statuspub')->on('tb_statusPub');
            $table->foreign('id_statussos')->references('id_statussos')->on('tb_statusSos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_mahasiswa');
    }
}

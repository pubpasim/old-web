<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbJadwalSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jadwal_survey', function (Blueprint $table) {
            $table->increments('id_jad_survey');
            $table->integer('id_daerah')->unsigned();
            $table->string('waktu');
            $table->string('jumlah_peserta');
            $table->integer('id_periode')->unsigned();
            $table->timestamps();
            $table->foreign('id_periode')->references('id_periode')->on('tb_periode');
            $table->foreign('id_daerah')->references('id_daerah')->on('tb_daerah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_jadwal_survey');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDaerahSos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_daerah_sos', function (Blueprint $table) {
            $table->increments('id_daerah_sos');
            $table->integer('id_daerah')->unsigned();
            $table->integer('id_sekolah')->unsigned();
            $table->integer('id_periode');
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
        Schema::dropIfExists('tb_daerah_sos');
    }
}

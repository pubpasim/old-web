<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDetHasilseleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_hasilseleksi', function (Blueprint $table) {
            $table->increments('id_det_seleksi');
            $table->integer('id_hasil')->unsigned();
            $table->integer('id_angkatan')->unsigned();
            $table->string('file');
            $table->timestamps();
            $table->foreign('id_angkatan')->references('id_angkatan')->on('tb_angkatan');
            $table->foreign('id_hasil')->references('id_hasil')->on('tb_hasil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_hasilseleksi');
    }
}

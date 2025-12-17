<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDetpendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detpendidikan', function (Blueprint $table) {
            $table->increments('id_detpendidikan');
            $table->integer('id_mahasiswa')->unsigned();
            $table->string('pendidikan');
            $table->string('universitas');
            $table->string('tahun_lulus');
            $table->timestamps();
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('tb_mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detpendidikan');
    }
}

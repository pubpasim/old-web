<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDetpelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detpelatihan', function (Blueprint $table) {
            $table->increments('id_detpelatihan');
            $table->integer('id_angkatan')->unsigned();
            $table->integer('id_pelatihan')->unsigned();
            $table->string('file');
            $table->timestamps();
            $table->foreign('id_angkatan')->references('id_angkatan')->on('tb_angkatan');
            $table->foreign('id_pelatihan')->references('id_pelatihan')->on('tb_pelatihan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detpelatihan');
    }
}

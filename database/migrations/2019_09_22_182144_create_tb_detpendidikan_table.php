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
            $table->integer('id_pendidikan')->unsigned();
            $table->string('pendidikan');
            $table->string('Universitas');
            $table->integer('Tahun_lulus');
            $table->timestamps();
            $table->foreign('id_pendidikan')->references('id_pendidikan')->on('tb_pendidikan');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDetpengalamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detpengalaman', function (Blueprint $table) {
            $table->increments('id_detpengalaman');
            $table->integer('id_pengalaman')->unsigned();
            $table->string('instansi');
            $table->string('lama_kerja');
            $table->string('jabatan');
            $table->timestamps();
            $table->foreign('id_pengalaman')->references('id_pengalaman')->on('tb_pengalaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detpengalaman');
    }
}

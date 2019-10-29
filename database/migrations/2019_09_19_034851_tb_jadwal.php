<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jadwal',function(Blueprint $table){
            $table->increments('id_jadwal');
            $table->integer('id_kategori_tes')->unsigned();
            $table->string('kegiatan');
            $table->timestamps();
            $table->foreign('id_kategori_tes')->references('id_kategori_tes')->on('tb_kategorites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('tb_jadwal');
    }
}

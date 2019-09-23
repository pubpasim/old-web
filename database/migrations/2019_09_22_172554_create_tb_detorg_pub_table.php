<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDetorgPubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detorg_pub', function (Blueprint $table) {
            $table->increments('id_detorg_pub');
            $table->integer('id_orgpub')->unsigned();
            $table->integer('id_angkatan')->unsigned();
            $table->integer('id_mahasiswa')->unsigned();
            $table->timestamps();
            $table->foreign('id_angkatan')->references('id_angkatan')->on('tb_angkatan');
            $table->foreign('id_orgpub')->references('id_orgpub')->on('tb_orgpub');
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
        Schema::dropIfExists('tb_detorg_pub');
    }
}

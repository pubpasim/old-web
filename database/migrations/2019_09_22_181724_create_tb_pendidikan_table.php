<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pendidikan', function (Blueprint $table) {
            $table->increments('id_pendidikan');
            $table->integer('id_mahasiswa')->unsigned();
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
        Schema::dropIfExists('tb_pendidikan');
    }
}

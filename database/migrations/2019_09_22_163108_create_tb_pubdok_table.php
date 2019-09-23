<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPubdokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pubdok', function (Blueprint $table) {
            $table->increments('id_pubdok');
            $table->string('file');
            $table->integer('id_angkatan')->unsigned();
            $table->timestamps();
            $table->foreign('id_angkatan')->references('id_angkatan')->on('tb_angkatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pubdok');
    }
}

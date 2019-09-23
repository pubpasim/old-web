<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbInfaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_infaq', function (Blueprint $table) {
            $table->increments('id_infaq');
            $table->integer('id_angkatan')->unsigned();
            $table->string('bulan');
            $table->string('tahun');
            $table->integer('total_infaq');
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
        Schema::dropIfExists('tb_infaq');
    }
}

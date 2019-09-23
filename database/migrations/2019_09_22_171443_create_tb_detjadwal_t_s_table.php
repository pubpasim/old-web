<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDetjadwalTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detjadwal_t_s', function (Blueprint $table) {
            $table->increments('id_detjadwal_ts');
            $table->integer('id_detjadwal')->unsigned();
            $table->integer('id_daerah')->unsigned();
            $table->string('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detjadwal_t_s');
    }
}

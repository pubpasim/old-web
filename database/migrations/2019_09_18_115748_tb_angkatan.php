<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbAngkatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_angkatan',function(Blueprint $table){
            $table->increments('id_angkatan');
            $table->string('nama_angkatan');
            $table->integer('angkatan');
            //$table->string('id')->foreignkey('id')->table('mahasiswa')
            $table->rememberToken();
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
        schema::dropIfExists('tb_angkatan');
    }
}

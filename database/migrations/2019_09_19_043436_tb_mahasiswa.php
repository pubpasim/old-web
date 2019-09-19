<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tb_mahasiswa',function(Blueprint $table){
        //     $table->increments('id_mahasiswa');
        //     $table->string('nama');
        //     $table->string('id_angkatan');
        //     $table->string('id')->foreignkey('id')->table('mahasiswa')
        //     $table->rememberToken();
        //     $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

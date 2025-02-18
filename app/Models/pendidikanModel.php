<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendidikanModel extends Model
{
	protected $table='tb_pendidikan';
    protected $fillable=['id_mahasiswa'];
    protected $primarykey='id_pendidikan';
}

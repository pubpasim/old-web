<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detPengalamanModel extends Model
{
	protected $table='tb_detpengalaman';
	protected $fillable=['id_mahasiswa','instansi','lama_kerja','jabatan'];
	protected $primarykey='id_detpengalaman';
}

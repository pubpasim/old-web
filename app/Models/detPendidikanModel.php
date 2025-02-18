<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detPendidikanModel extends Model
{
	protected $table='tb_detpendidikan';
    protected $fillable=['id_pendidikan','pendidikan','Universitas','Tahun_lulus'];
    protected $primarykey='id_detpendidikan';
}

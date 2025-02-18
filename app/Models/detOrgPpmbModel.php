<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detOrgPpmbModel extends Model
{
	protected $table='tb_detorg_ppmb';
    protected $fillable=['id_orgppmb','id_angkatan','id_mahasiswa','id_periode'];
    protected $primarykey='id_detil';
    
}

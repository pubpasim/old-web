<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detOrgPpmbModel extends Model
{
	protected $table='tb_detorg_ppmb';
    protected $fillable=['id_orgppmb','id_angkatan','id_mahasiswa'];
    protected $primarykey='id_detil';
    
}

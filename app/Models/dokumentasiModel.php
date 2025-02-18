<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokumentasiModel extends Model
{
     protected $table='tb_pubdok';
    protected $fillable=['id_pubdok','id_angkatan','tema','keterangan','file'];
    protected $primarykey='id_pubdok';
}

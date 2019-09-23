<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detJadwalModel extends Model
{
    protected $table='tb_detjadwal';
    protected $fillable=['id_jadwal','id_angkatan','keterangan'];
    protected $primarykey='id_detjadwal';
    
}

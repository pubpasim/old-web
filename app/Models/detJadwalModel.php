<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detJadwalModel extends Model
{
    protected $table='tb_detjadwal';
    protected $fillable=['id_jadwal','id_periode','id_daerah','tanggal_awal','tanggal_akhir','waktu','id_sekolah','alamat'];
    protected $primarykey='id_detjadwal';
    
}

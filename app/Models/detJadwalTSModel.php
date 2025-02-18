<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detJadwalTSModel extends Model
{
	protected $table='tb_detjadwal_t_s';
    protected $fillable=['id_detjadwal','id_daerah','tanggal'];
    protected $primarykey='id_detjadwal_ts';
    
}

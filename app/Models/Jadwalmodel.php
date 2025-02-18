<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwalmodel extends Model
{
    protected $table='tb_jadwal';
    protected $fillable=['id_kategori_tes','kegiatan'];
    protected $primarykey='id_jadwal';
}

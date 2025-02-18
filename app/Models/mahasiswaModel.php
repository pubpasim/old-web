<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswaModel extends Model
{
    protected $table='tb_mahasiswa';
    protected $fillable=['NIM','id_angkatan','id_sekolah','id_daerah','nama','id_orgppmb','id_orgpub','id_jur','id_statusPub','id_statusSos'];
    protected $primarykey='id_mahasiswa';
}

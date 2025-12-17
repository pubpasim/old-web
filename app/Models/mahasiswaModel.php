<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahasiswaModel extends Model
{
    protected $table='tb_mahasiswa';
    protected $fillable=['','id_angkatan','id_sekolah','id_daerah','nama','id_orgppmb','id_orgpub','id_jur','id_statuspub','id_statussos'];
    protected $primarykey='id_mahasiswa';
}

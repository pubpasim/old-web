<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengalamanModel extends Model
{
    protected $table='tb_pengalaman';
    protected $fillable=['id_mahasiswa','pengalaman'];
    protected $primarykey='id_pengalaman';
}

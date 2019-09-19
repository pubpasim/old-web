<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusanModel extends Model
{
    protected $table='tb_jjurusan';
    protected $fillable=['nama_jur'];
    protected $primarykey='id_jur';
}

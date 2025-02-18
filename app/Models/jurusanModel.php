<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jurusanModel extends Model
{
    protected $table='tb_jurusan';
    protected $fillable=['nama_jur'];
    protected $primarykey='id_jur';
}

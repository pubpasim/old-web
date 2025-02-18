<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class angkatanModel extends Model
{
    protected $table='tb_angkatan';
    protected $fillable=['nama_angkatatan','angkatan'];
    protected $primarykey='id_angkatan';
}

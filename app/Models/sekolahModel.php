<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sekolahModel extends Model
{
    protected $table='tb_sekolah';
    protected $fillable=['sekolah'];
    protected $primarykey='id_sekolah';
}

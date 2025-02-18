<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sekolahModel extends Model
{
    protected $table='tb_sekolah';
    protected $fillable=['sekolah'];
    protected $primarykey='id_sekolah';
}

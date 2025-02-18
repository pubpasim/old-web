<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detPelatihanModel extends Model
{
    protected $table='tb_detPelatihan';
    protected $fillable=['id_angkatan','id_pelatihan','file'];
    protected $primarykey='id_detPelatihan';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detHasilSelModel extends Model
{
    protected $table='tb_det_hasilseleksi';
    protected $fillable=['id_hasil','id_angkatan','file'];
    protected $primarykey='id_det_seleksi';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ppmbDokModel extends Model
{
    protected $table='tb_ppmb_dok';
    protected $fillable=['id_angkatatan','file'];
    protected $primarykey='id_ppmbdok';
}

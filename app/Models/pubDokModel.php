<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pubDokModel extends Model
{
    protected $table='tb_pub_dok';
    protected $fillable=['id_angkatatan','file'];
    protected $primarykey='id_pubdok';
}

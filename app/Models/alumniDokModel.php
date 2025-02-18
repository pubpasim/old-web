<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alumniDokModel extends Model
{
    protected $table='tb_alumni_dok';
    protected $fillable=['id_angkatatan','file','keterangan'];
    protected $primarykey='id_alumnidok';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class daerahModel extends Model
{
    protected $table='tb_daerah';
    protected $fillable=['kab_kot'];
    protected $primarykey='id_daerah';
}

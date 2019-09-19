<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tahunModel extends Model
{
    protected $table='tb_tahun';
    protected $fillable=['tahun'];
    protected $primarykey='id_tahun';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bulanModel extends Model
{
    protected $table='tb_bulan';
    protected $fillable=['bulan'];
    protected $primarykey='id_bulan';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelatihanModel extends Model
{
    protected $table='tb_pelatihan';
    protected $fillable=['pelatihan'];
    protected $primarykey='id_pelatihan';
}

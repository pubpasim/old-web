<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_pelatihanModel extends Model
{
    protected $table='tb_pelatihandetail';
    protected $fillable=['syarat'];
    protected $primarykey='id_syarat';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orgPPMBmodel extends Model
{
    protected $table='tb_orgppmb';
    protected $fillable=['jabatan'];
    protected $primarykey='id_orgppmb';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orgPUBmodel extends Model
{
    protected $table='tb_orgPub';
    protected $fillable=['jabatan'];
    protected $primarykey='id_orgpub';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orgPPMBmodel extends Model
{
    protected $table='tb_orgppmb';
    protected $fillable=['jabatan'];
    protected $primarykey='id_orgppmb';
}

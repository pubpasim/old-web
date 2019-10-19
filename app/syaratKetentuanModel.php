<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class syaratKetentuanModel extends Model
{
    protected $table='tb_syarat_ketentuan';
    protected $fillable=['syarat'];
    protected $primarykey='id_syarat';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detOrgPubModel extends Model
{
    protected $table='tb_detorg_pub';
    protected $fillable=['id_orgpub','id_angkatan','id_mahasiswa'];
    protected $primarykey='id_detorg_pub';
    
}

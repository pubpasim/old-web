<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class statusPubModel extends Model
{
    protected $table='tb_statusPub';
    protected $fillable=['status'];
    protected $primarykey='id_status';
}

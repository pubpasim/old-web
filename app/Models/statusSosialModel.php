<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class statusSosialModel extends Model
{
    protected $table='tb_statusSosial';
    protected $fillable=['status'];
    protected $primarykey='id_status';
}

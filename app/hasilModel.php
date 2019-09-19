<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hasilModel extends Model
{
     protected $table='tb_hasil';
    protected $fillable=['kegiatan'];
    protected $primarykey='id_hasil';
}

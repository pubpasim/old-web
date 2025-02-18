<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class infaqModel extends Model
{
	protected $table='tb_infaq';
    protected $fillable=['id_angkatan','bulan','tahun','total_infaq'];
    protected $primarykey='id_infaq';
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
	protected $table='tb_user';
	protected $fillable=['username','password','level'];
    protected $primarikey='id_user';
}

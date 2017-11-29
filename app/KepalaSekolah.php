<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    protected $table = 'kepala_sekolah';
    protected $primaryKey = 'id_kepala_sekolah';

    protected $fillable = [
    	'nama', 'sambutan', 'foto', 'status'
    ];

    public $timestamps = false;
}

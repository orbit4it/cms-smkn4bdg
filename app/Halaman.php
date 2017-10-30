<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    protected $table = 'halaman';
    protected $primaryKey = 'id_halaman';
    protected $fillable = [
    	'judul',
    	'deskripsi',
    	'foto',
    	'slug',
    	'hits'
    ];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
	protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $fillable = [
    	'id_album',
    	'judul',
    	'deskripsi',
    	'foto',
    ];

    public $timestamps = false;
}

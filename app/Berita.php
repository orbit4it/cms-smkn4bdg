<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
    	'judul_berita',
    	'isi_berita',
    	'tanggal_berita',
    	'foto',
    ];

    protected $dates = [
    	'created_at', 'updated_at'
    ];
}

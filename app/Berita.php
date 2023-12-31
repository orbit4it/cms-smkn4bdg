<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
    	'judul',
    	'deskripsi',
    	'foto',
    	'slug',
        'id_kategori',
        'hits',
        'created_at',
    ];

    protected $dates = [
    	'created_at', 'updated_at'
    ];
}

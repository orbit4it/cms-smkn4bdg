<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $primaryKey = 'id_album';
    protected $fillable = [
    	'judul',
    	'deskripsi',
    	'foto',
    	'slug',
    	'hits'
    ];

    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kalender extends Model
{
    protected $table = 'kalender';
    protected $primaryKey = 'id_kalender';
    protected $fillable = [
    	'judul',
    	'start',
    	'end',
    ];
    protected $dates = [
    	'start',
    	'end',
    ];
    public $timestamps = false;
}

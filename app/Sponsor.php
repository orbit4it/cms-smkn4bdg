<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table =  'sponsor';
    protected $primaryKey = 'id_sponsor';
    protected $fillable = [
    	'nama',
    	'foto',
    ];
    public $timestamps = false;
}

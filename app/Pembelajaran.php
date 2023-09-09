<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    protected $table = 'pembelajaran';
    protected $primaryKey = 'id_pembelajaran';
    protected $fillable = [
        'id_mata_pelajaran',
        'semester',
        'nama',
        'total_pembelajaran',
    ];
}
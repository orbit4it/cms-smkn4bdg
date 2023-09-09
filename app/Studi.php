<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studi extends Model
{
    protected $table = 'studi';
    protected $primaryKey = 'id_studi';

    protected $fillable = [
        'nama_studi',
        'slug',
        'foto',
        'deskripsi'
    ];

    public function mataPelajaran()
    {
        return $this->hasMany('App\MataPelajaran', 'id_studi', 'id_studi');
    }

    public function pembelajaran()
    {
        return $this->hasManyThrough(
            'App\Pembelajaran',
            'App\MataPelajaran',
            'id_studi',
            'id_mata_pelajaran',
            'id_studi',
            'id_mata_pelajaran'
        );
    }

}
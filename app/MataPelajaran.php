<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id_mata_pelajaran';
    protected $fillable = [
        'id_studi',
        'nama',
    ];


    public function pembelajaran()
    {
        return $this->hasMany('App\Pembelajaran', 'id_mata_pelajaran', 'id_mata_pelajaran');
    }
}
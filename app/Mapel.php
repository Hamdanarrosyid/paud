<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $id = 'id';
    protected $fillable = ['kode','nama','tahunajaran_id','kelas_id','keterangan'];

    public function tahun()
    {
        return $this->belongsTo('App\Tahunajaran','tahunajaran_id');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Kelas','kelas_id');
    }
    public function guru()
    {
        return $this->belongsToMany('App\Guru');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $id = 'id';
    protected $fillable = ['nama','walimurid_id','tempat_id', 'tanggal','gender_id','agama_id'];

    public function walimurid(){
        return $this->belongsTo('App\Walimurid','walimurid_id');
    }public function tempat(){
        return $this->belongsTo('App\Kota','tempat_id');
    }
    public function gender(){
        return $this->belongsTo('App\Kelamin','gender_id');
    }
    public function agama(){
        return $this->belongsTo('App\Agama','agama_id');
    }
    public function mapel(){
        return $this->belongsToMany(Mapel::class);
    }
}

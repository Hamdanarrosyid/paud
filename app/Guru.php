<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $id = 'id';
    protected $fillable = ['nama','tempat_id', 'tanggal','gender_id','agama_id','nohp','alamat'];

    public function tempat(){
    return $this->belongsTo('App\Kota','tempat_id');
}
    public function gender(){
        return $this->belongsTo('App\Kelamin','gender_id');
    }
    public function agama(){
        return $this->belongsTo('App\Agama','agama_id');
    }
}

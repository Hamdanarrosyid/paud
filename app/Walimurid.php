<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Walimurid extends Model
{
    protected $table = 'walimurid';
    protected $id = 'id';
    protected $fillable = ['nama','nohp','agama_id','gender_id','pekerjaan_id','alamat'];

    public function gender(){
        return $this->belongsTo('App\Kelamin','gender_id');
    }
    public function agama(){
        return $this->belongsTo('App\Agama','agama_id');
    }
    public function pekerjaan(){
        return $this->belongsTo('App\Pekerjaan','pekerjaan_id');
    }
}

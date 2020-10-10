<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table = 'tema';
    protected $id = 'id';
    protected $fillable = ['tema'];

    public function subTema()
    {
        return $this->belongsToMany(SubTema::class,'tema_sub_tema');
    }
    public function kd()
    {
        return $this->belongsToMany(KompetensiDasar::class,'tema_kompetensi_dasar');
    }
}

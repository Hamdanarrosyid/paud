<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTema extends Model
{
    protected $table = 'sub_tema';
    protected $id = 'id';
    protected $fillable = ['sub_tema'];

    public function rppm()
    {
        return $this->hasMany(Rppm::class);
    }
    public function tema()
    {
        return $this->belongsToMany(Tema::class,ProgramSemester::class);
    }

}

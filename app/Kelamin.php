<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelamin extends Model
{
    protected $table = 'jenis_kelamin';
    protected $id = 'id';
    protected $fillable = ['jeniskelamin'];
}

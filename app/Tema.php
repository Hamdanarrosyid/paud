<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table = 'tema';
    protected $id = 'id';
    protected $fillable = ['tema'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $id = 'id';
    protected $fillable = ['kelas','keterangan'];
}

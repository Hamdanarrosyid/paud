<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $id = 'id';
    protected $fillable = ['time','senin','selasa', 'rabu','kamis','jumat'];
}

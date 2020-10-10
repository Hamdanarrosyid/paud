<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahunajaran extends Model
{
    protected $table = 'tahunajaran';
    protected $id = 'id';
    protected $fillable = ['tahun'];
}

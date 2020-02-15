<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    protected $table = 'sarana';
    protected $id = 'id';
    protected $fillable = ['perlengkapan','jumlah','kondisibaik','kondisirusak'];
}

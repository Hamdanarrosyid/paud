<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'Kota';
    protected $id = 'id';
    protected $fillable = ['kota'];
}

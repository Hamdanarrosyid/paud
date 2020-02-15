<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prasarana extends Model
{
    protected $table = 'prasarana';
    protected $id = 'id';
    protected $fillable = ['namaruang','jumlah','panjang','lebar'];
}

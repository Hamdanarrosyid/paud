<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KompetensiDasar extends Model
{
    protected $table = 'kompetensi_dasar';
    protected $id = 'id';
    protected $fillable = ['kode','kompetensi_dasar'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester';
    protected $id = 'id';
    protected $fillable = ['semester','tahun_id'];

    public function tahunAjaran()
    {
        return $this->belongsTo(Tahunajaran::class,'tahun_id');
    }
}

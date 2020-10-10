<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rppm extends Model
{
    protected $table = 'rppm';
    protected $id = 'id';
    protected $fillable = ['sub_tema_id','kd','muatan_belajar','rencana_kegiatan'];

    public function subTema()
    {
        return $this->belongsTo(SubTema::class);
    }
}

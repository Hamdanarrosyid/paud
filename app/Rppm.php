<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rppm extends Model
{
    protected $table = 'rppm';
    protected $id = 'id';
    protected $fillable = ['sub_tema_id','kompetensi_dasar_id','muatan_belajar','rencana_kegiatan'];

    public function subTema()
    {
        return $this->belongsTo(SubTema::class,'sub_tema_id');
    }
    public function kd()
    {
        return $this->belongsTo(KompetensiDasar::class,'kompetensi_dasar_id');
    }
}

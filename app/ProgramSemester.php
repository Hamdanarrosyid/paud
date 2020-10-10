<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramSemester extends Model
{
    protected $table = 'program_semester';
    protected $id = 'id';
    protected $fillable = ['tema_id','semester_id','bulan_id'];

    public function tema()
    {
        return $this->belongsTo(Tema::class,'tema_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    public function bulan()
    {
        return $this->belongsTo(Bulan::class);
    }
}

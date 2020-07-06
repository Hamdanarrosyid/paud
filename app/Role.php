<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $id = 'id';
    protected $fillable = ['role'];

    public function users()
    {
        return $this->hasMany('App\users');
    }
    public function permissions()
    {
        return $this->belongsToMany('App\Permissions');
    }
}


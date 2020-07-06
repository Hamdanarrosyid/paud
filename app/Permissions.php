<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';
    protected $id = 'id';
    protected $fillable = ['permission','for'];

    public function role()
    {
        return $this->hasMany('App\Role');
    }
}

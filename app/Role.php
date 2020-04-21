<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    //
    public function userRole()
    {
        return $this->hasMany('App\UserRole');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','user_role','role_id','uid');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_role';
    //
    public function users()
    {
        return $this->belongsTo('App\User','uid','id');
    }
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}

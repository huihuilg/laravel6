<?php


namespace App\Model\User;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'l_user';

    protected $fillable = [
        'user_name',
        'real_name',
        'mobile',
        'email',
        'password',
        'id_card',
        'gender',
        'birthday',
        'wechat',
        'created_at',
    ];

    protected $hidden = [
        'deleted_at'
    ];
}

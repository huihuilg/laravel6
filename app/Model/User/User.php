<?php


namespace App\Model\User;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    protected $fillable = [
        'name',
        'age',
        'created_at',
    ];

    protected $hidden = [
        'deleted_at'
    ];
}
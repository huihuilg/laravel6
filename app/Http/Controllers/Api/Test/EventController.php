<?php


namespace App\Http\Controllers\Test;


use App\Events\UserLogin;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function event()
    {
        $a = 22222222;
        event(new UserLogin($a));
    }
}
<?php


namespace App\Http\Controllers;

use App\Events\UserLogin;
use App\Jobs\RebbitMq;
use App\Jobs\testJob;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    /**
     * TestController constructor.
     */
    public function __construct()
    {
//        $this->middleware('auth');

        $this->middleware('age')->only('age');

//        $this->middleware('subscribed')->except('store');
    }


    /**
     * @param  Request  $request
     */
    public function store(Request $request)
    {
//        $this->dispatch();
        RebbitMq::dispatch();
    }

    /**
     * @param Request $request
     */
    public function age(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'age' => 'required|max:255',
        ]);
        dump($validator->messages());
    }

    public function eventTest()
    {
        $a = 22222222;
        event(new UserLogin($a));
    }

    /**
     * 数据库操作
     */
    public function dbTest(Request $request)
    {
        $user = Role::find(1)->users;
        return $user;
    }


    public function upload(Request $request)
    {
        $request->file('qa')->store('/images');
        echo 1;
    }

}

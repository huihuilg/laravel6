<?php


namespace App\Http\Controllers;

use App\Jobs\Wzb;
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
        Wzb::dispatch();
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

    /**
     * 数据库操作
     */
    public function dbTest(Request $request)
    {
//        $user = User::find(1)->userRole;
        $user = Role::find(1)->users;
        return $user;
    }


}

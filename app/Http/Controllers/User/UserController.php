<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Model\User\User;
use phpseclib\Crypt\Random;

class UserController extends BaseController
{
    /**
     * Notes: 测试方法
     * User: hui
     * Date: 2020/12/4
     * Time: 10:38 下午
     */
    public function test()
    {
        $salt = Random::string(6);
        dd($salt);
        return User::query()->create(['mobile' => '18500254733','email' => '18500254733@165.com', '']);
    }
}

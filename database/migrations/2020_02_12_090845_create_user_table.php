<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_user', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('username', 64)->comment('用户名')->default("");
            $table->string('nickname', 64)->comment('昵称')->default("");
            $table->string('realname', 64)->comment('真实姓名')->default("");
            $table->string('mobile', 16)->comment('手机号')->default("");
            $table->string('password', 64)->comment('密码，加密后的字符串')->default("");
            $table->string('salt', 12)->comment('密码盐值')->default("");
            $table->tinyInteger('gender')->comment('性别，1：男 2：女 3：未知')->default(3);
            $table->tinyInteger('status')->comment('状态，1：正常 5：禁用')->default(1);
            $table->timestamp('last_login_at')->nullable()->comment('最后在线时间');
            $table->string('avatar',256)->comment('头像图地址')->default("");
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_user COMMENT='用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_user');
    }
}

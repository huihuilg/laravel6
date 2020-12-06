<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name', 32)->default('')->comment('用户名');
            $table->string('real_name', 32)->default('')->comment('真实姓名');
            $table->string('mobile', 32)->default('')->comment('手机号');
            $table->string('email', 64)->default('')->comment('邮箱');
            $table->string('password', 64)->default('')->comment('密码');
            $table->string('id_card', 32)->default('')->comment('身份证号');
            $table->tinyInteger('gender')->default(3)->comment('性别  1:男 2:女 3:未知');
            $table->date('birthday')->nullable()->comment('生日');
            $table->string('wechat')->default('')->comment('微信号');
            $table->string('qq')->default('')->comment('qq号');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table l_user comment='用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_user');
    }
}

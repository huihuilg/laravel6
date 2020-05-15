<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUserWeixinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_user_weixin', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('user_id')->comment('用户id')->default(0);
            $table->string('union_id', 64)->comment('微信unionid')->default("");
            $table->string('nickname', 64)->comment('昵称')->default("");
            $table->string('mobile', 64)->comment('用户微信手机号')->default("");
            $table->tinyInteger('gender')->comment('性别，1：男 2：女 3：未知')->default(3);
            $table->string('avatar',256)->comment('微信头像图地址')->default("");
            $table->string('province',32)->comment('省')->default("");
            $table->string('city',32)->comment('市')->default("");
            $table->string('country',32)->comment('区')->default("");
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_user_weixin COMMENT='用户微信表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_user_weixin');
    }
}

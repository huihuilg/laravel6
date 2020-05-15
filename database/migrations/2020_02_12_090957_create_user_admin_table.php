<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUserAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_user_admin', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('user_id')->comment('用户id')->default(0);
            $table->unsignedInteger('role_id')->comment('角色id')->default(0);
            $table->string('username', 64)->comment('后台用户名')->default("");
            $table->string('password', 64)->comment('密码，加密后的字符串')->default("");
            $table->string('salt', 12)->comment('密码盐值')->default("");
            $table->string('nickname', 64)->comment('昵称')->default("");
            $table->tinyInteger('status')->comment('状态，1：正常 5：禁用')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_user_admin COMMENT='后台用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_user_admin');
    }
}

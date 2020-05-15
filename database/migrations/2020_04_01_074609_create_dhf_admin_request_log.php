<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfAdminRequestLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_user_admin_request_log', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('menu_id')->comment('菜单id')->default(0);
            $table->unsignedInteger('admin_id')->comment('后台用户id')->default(0);
            $table->string('ip', 26)->comment('ip')->default("");
            $table->mediumText('input')->comment('请求参数json串');
            $table->mediumText('response')->comment('返回数据json串');
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_user_admin_request_log COMMENT='后台操作日志表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_admin_request_log');
    }
}

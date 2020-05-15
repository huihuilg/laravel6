<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfAdminMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_user_admin_menu', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('parent_id')->comment('父id')->default(0);
            $table->string('name', 64)->comment('菜单名')->default("");
            $table->string('url', 64)->comment('地址')->default("");
            $table->string('api_url', 64)->comment('接口地址')->default("");
            $table->tinyInteger('type')->comment('类型，1展开菜单，3点击菜单，5功能点')->default(1);
            $table->tinyInteger('is_open')->comment('是否开放（不做限制），1开放，2不开启')->default(1);
            $table->tinyInteger('is_log')->comment('是否记录日志，1记录，2不记录')->default(2);
            $table->unsignedInteger('sort')->comment('排序，数字越大排序越靠前')->default(0);
            $table->tinyInteger('status')->comment('状态，1正常，5禁用')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_user_admin_menu COMMENT='后台菜单表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_admin_menu');
    }
}

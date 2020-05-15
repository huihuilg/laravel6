<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfAdminMenuPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_user_admin_menu_permission', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('menu_id')->comment('菜单id')->default(0);
            $table->unsignedInteger('role_id')->comment('角色id')->default(0);
            $table->unsignedInteger('admin_id')->comment('后台用户id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_user_admin_menu_permission COMMENT='后台菜单权限表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_admin_menu_permission');
    }
}

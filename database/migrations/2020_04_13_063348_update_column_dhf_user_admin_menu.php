<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfUserAdminMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_user_admin_menu', function (Blueprint $table) {
            $table->tinyInteger('is_show')->default(1)->comment('是否显示,1:显示 0:隐藏');
            $table->string('menu_code',50)->default('')->comment('节点编号')->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhf_user_admin_menu', function (Blueprint $table) {
            //
        });
    }
}

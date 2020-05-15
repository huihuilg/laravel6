<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfUserAdminMenuPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_user_admin_menu_permission', function (Blueprint $table) {
            $table->tinyInteger('type')->default(0)->comment('所属系统分类,1:总部 2:大区 3:门店')->after('admin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhf_user_admin_menu_permission', function (Blueprint $table) {
            //
        });
    }
}

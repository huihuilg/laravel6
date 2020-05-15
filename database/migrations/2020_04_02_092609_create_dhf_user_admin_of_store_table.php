<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfUserAdminOfStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_user_admin_of_store', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_admin_id')->comment('后台用户id');
            $table->integer('store_id')->comment('门店id');
            $table->integer('dhf_area_id')->comment('大区id')->default(0);
            $table->tinyInteger('type')->default(0)->comment('类别,1:大区全部 0:无');
            $table->tinyInteger('status')->default(1)->comment('状态,1:正常');
            $table->integer('admin_of_role_id')->comment('角色关联表id');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_user_admin_of_store COMMENT='后台用户门店权限关联'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_user_admin_of_store');
    }
}

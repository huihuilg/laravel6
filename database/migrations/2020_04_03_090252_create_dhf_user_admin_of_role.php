<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfUserAdminOfRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_user_admin_of_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_admin_id')->comment('后台用户id');
            $table->integer('role_id')->comment('后台角色id');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_user_admin_of_role COMMENT='后台用户多角色绑定关联'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_user_admin_of_role');
    }
}

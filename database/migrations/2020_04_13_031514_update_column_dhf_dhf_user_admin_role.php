<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfDhfUserAdminRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_user_admin_role', function (Blueprint $table) {
            $table->integer('department_id')->comment('所属部门id')->after('name');
            $table->string('remark',50)->default('')->comment('备注')->after('department_id');
            $table->integer('user_admin_id')->comment('创建人id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhf_user_admin_role', function (Blueprint $table) {
            //
        });
    }
}

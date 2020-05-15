<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfUserAdminRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_user_admin_role', function (Blueprint $table) {
            $table->tinyInteger('type')->default(1)->comment('类别,1:总部 2:大区 3:门店')->after('name');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDhfUserAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_user_admin', function (Blueprint $table) {
            $table->integer('store_id')->default(0)->comment('门店id')->after('user_id');
            $table->integer('dhf_area_id')->default(0)->comment('大区id')->after('store_id');
            $table->tinyInteger('identity')->default(1)->comment('身份,1:总部 2:大区 3:门店 4:业务员')
                ->after('dhf_area_id');
            $table->string('card_num','32')->comment('身份证号')->default('')->after('identity');
            $table->string('email',32)->comment('邮箱')->default('')->after('identity');
            $table->string('address',64)->comment('详细地址')->default('')->after('email');
            $table->integer('user_admin_id')->comment('创建人')->default(0)->after('address');
            $table->dropColumn('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhf_user_admin', function (Blueprint $table) {
            //
        });
    }
}

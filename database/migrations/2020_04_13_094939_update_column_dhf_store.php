<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_store', function (Blueprint $table) {
            $table->dropColumn(['province_id','city_id','area_id','adcode']);
            $table->string('source_num',30)->default('')->comment('创建来源编号')->after('status');
            $table->integer('province_code')->comment('省编码')->after('source_num');
            $table->integer('city_code')->comment('市区编码')->after('province_code');
            $table->integer('county_code')->comment('县编码')->after('city_code');
            $table->string('province_name',20)->comment('省名称')->after('county_code');
            $table->string('city_name',20)->comment('市名称')->after('province_name');
            $table->string('county_name',20)->comment('县名称')->after('city_name');
            $table->string('images',500)->default('')->comment('图片组');
            $table->integer('company_id')->default(1)->comment('公司id, 1:大黄蜂 2:景天')->after('name');
            $table->integer('user_admin_id')->default(0)->comment('创建人')->after('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhf_store', function (Blueprint $table) {
            //
        });
    }
}

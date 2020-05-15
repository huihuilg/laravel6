<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_area', function (Blueprint $table) {
            $table->string('code',10)->default('')->comment('大区编号');
            $table->integer('company_id')->default(1)->comment('公司id, 1:大黄蜂 2:景天')->after('name');
            $table->string('applicant',20)->default('')->comment('申请人')->after('company_id');
            $table->integer('province_code')->comment('省编码')->after('applicant');
            $table->integer('city_code')->comment('市区编码')->after('province_code');
            $table->integer('county_code')->comment('县编码')->after('city_code');
            $table->string('province_name',20)->comment('省名称')->after('county_code');
            $table->string('city_name',20)->comment('市名称')->after('province_name');
            $table->string('county_name',20)->comment('县名称')->after('city_name');
            $table->string('address',100)->comment('详细地址')->after('county_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhf_area', function (Blueprint $table) {
            //
        });
    }
}

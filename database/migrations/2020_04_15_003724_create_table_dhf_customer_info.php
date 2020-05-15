<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDhfCustomerInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_customer_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->comment('客户id');
            $table->string('mobile',20)->default('')->comment('联系方式');
            $table->string('name',30)->default('')->comment('联系人');
            $table->integer('gender')->default(0)->comment('性别,0:未知 1:男 2:女');
            $table->integer('store_id')->default(0)->comment('门店id');
            $table->integer('user_admin_id')->default(0)->comment('添加人id');
            $table->tinyInteger('type')->default(1)->comment('添加类别,1:业务员添加 0:非业务员添加');
            $table->string('position_name')->default('')->comment('职位名称');
            $table->integer('province_code')->default(0)->comment('省编码');
            $table->integer('city_code')->default(0)->comment('市区编码');
            $table->integer('county_code')->default(0)->comment('县编码');
            $table->string('province_name',20)->default('')->comment('省名称');
            $table->string('city_name',20)->default('')->comment('市名称');
            $table->string('county_name',20)->default('')->comment('县名称');
            $table->string('address',100)->default('')->comment('详细地址');
            $table->string('remark',200)->default('')->comment('备注');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_customer_info COMMENT='客户联系表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_customer_info');
    }
}

<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDhfWarehouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_warehouse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->default('')->comment('仓库名称');
            $table->string('code',20)->default('')->comment('仓库编号');
            $table->string('source_num',30)->default('')->comment('申请来源单号');
            $table->integer('company_id')->default(1)->comment('公司所属,1:大黄蜂 2:景天');
            $table->integer('dhf_area_id')->comment('大区id');
            $table->integer('store_id')->comment('门店id');
            $table->integer('province_code')->comment('省编码');
            $table->integer('city_code')->comment('市区编码');
            $table->integer('county_code')->comment('县编码');
            $table->string('province_name',20)->comment('省名称');
            $table->string('city_name',20)->comment('市名称');
            $table->string('county_name',20)->comment('县名称');
            $table->string('address',200)->default('')->comment('详细地址');
            $table->string('images',500)->default('')->comment('图片组');
            $table->integer('user_admin_id')->comment('创建人');
            $table->string('longitude',20)->default('')->comment('经度');
            $table->string('latitude',20)->default('')->comment('纬度');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE dhf_warehouse COMMENT='仓库'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_warehouse');
    }
}

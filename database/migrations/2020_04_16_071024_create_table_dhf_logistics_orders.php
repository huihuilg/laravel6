<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDhfLogisticsOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_logistics_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('source_id')->default(0)->comment('来源id');

            $table->string('source_code',20)->default('')->comment('来源编号');
            $table->string('contract_num',30)->default('')->comment('合同编号');
            $table->integer('company_id')->comment('物流公司id');
            $table->string('logistics_user_name',20)->default('')->comment('物流人员');
            $table->string('logistics_user_mobile',20)->default('')->comment('物流人员联系方式');
            $table->timestamp('start_at')->comment('发车时间');
            $table->integer('num')->default(0)->comment('设备数量');

            $table->integer('deliver_province_code')->comment('发货地省编码');
            $table->integer('deliver_city_code')->comment('发货地市区编码');
            $table->integer('deliver_county_code')->comment('发货地县编码');
            $table->string('deliver_province_name',20)->default('')->comment('发货地省名称');
            $table->string('deliver_city_name',20)->default('')->comment('发货地市名称');
            $table->string('deliver_county_name',20)->default('')->comment('发货地县名称');
            $table->string('deliver_address',100)->default('')->comment('发货地详细地址');

            $table->integer('receive_province_code')->comment('目的地省编码');
            $table->integer('receive_city_code')->comment('目的地市区编码');
            $table->integer('receive_county_code')->comment('目的地县编码');
            $table->string('receive_province_name',20)->default('')->comment('目的地省名称');
            $table->string('receive_city_name',20)->default('')->comment('目的地市名称');
            $table->string('receive_county_name',20)->default('')->comment('目的地县名称');
            $table->string('receive_address',100)->default('')->comment('目的地详细地址');

            $table->integer('total_price')->default(0)->comment('总费用 单位:分');
            $table->string('remark',200)->default('')->comment('备注');
            $table->string('bill_images',200)->default('')->comment('单据照片');
            $table->string('other_images',500)->default('')->comment('其他图片');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_logistics_orders COMMENT='物流订单'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_logistics_orders');
    }
}

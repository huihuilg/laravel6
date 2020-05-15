<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentOutLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_out_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('source_num',30)->comment('来源编号 如:采购单/出库单/外置出库');
            $table->string('log_num',30)->default('')->comment('出库单号');
            $table->tinyInteger('type')->comment('出库类型,1:进场出库 2:调拨出库 3:设备处置 4:临时占用 5:占存退还 9:其他');
            $table->date('operation_time')->nullable()->comment('操作日期 如:调拨日期/处置申请日期');
            $table->integer('store_id')->comment('门店id');
            $table->integer('warehouse_id')->comment('仓库id');
            $table->timestamp('warehousing_time')->nullable()->comment('出库时间');
            $table->string('delivery_user_admin_id',20)->comment('交机人id,user_admin');
            $table->string('pick_up_user_name',20)->comment('接机人');
            $table->string('pick_up_user_mobile',20)->nullable()->comment('接机人联系方式');
            $table->string('address',200)->default('')->comment('目的地址');
            $table->integer('user_admin_id')->comment('创建人, user_admin id');
            $table->string('remark',50)->default('')->comment('备注');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_out_log COMMENT='设备出库记录'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_out_log');
    }
}

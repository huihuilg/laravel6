<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('equipment_num',30)->comment('设备自编号');
            $table->string('equipment_code',30)->comment('设备机号');
            $table->integer('equipment_type_id')->comment('设备型号id');
            $table->tinyInteger('status')->default(1)->comment('设备状态,1:正常 2:维修 3:保养 4:占用 5:报废 6:处置');
            $table->tinyInteger('lease_status')->default(1)->comment('租赁状态,0:待租 1:在租');
            $table->tinyInteger('other_status')->default(1)->comment('设备租赁关联状态,1:在库 2:退场在途 3:已退场 4:进场在途 5:已进场 9:其他');
            $table->tinyInteger('source_type')->default(1)->comment('设备来源,1:自有 2:转租');
            $table->string('address',200)->default('')->comment('设备地址');
            $table->string('long_lat',24)->default('')->comment('设备当前经纬度');
            $table->integer('warehouse_id')->default(0)->comment('所属仓库id');
            $table->integer('store_id')->default(0)->comment('所属门店id');
            $table->timestamp('made_time')->nullable()->comment('生产日期');
            $table->float('working_hours',5,1)->default(0)->comment('工作总时长');
            $table->integer('price')->default(0)->comment('购置单价 单位:分');
            $table->string('depreciation_year')->default('')->comment('折旧年限');
            $table->string('certificate_images',500)->default('')->comment('合格证 多图');
            $table->string('test_report_images',500)->default('')->comment('检测报告 多图');
            $table->integer('user_admin_id')->comment('录入人id');
            $table->string('remark',200)->default('')->comment('备注');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment COMMENT='设备表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment');
    }
}

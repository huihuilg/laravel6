<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentRepairReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_repair_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_repair_id')->comment('维修申请单id');
            $table->integer('equipment_id')->comment('设备id');
            $table->integer('contract_id')->default(0)->comment('合同id');
            $table->timestamp('start_at')->nullable()->comment('维修开始时间');
            $table->timestamp('end_at')->nullable()->comment('维修结束时间');
            $table->tinyInteger('is_recovery')->default(0)->comment('是否回收配件,1:回收 0:不回收');
            $table->tinyInteger('repair_type')->comment('维修类型,1:在租维修 2:待租维修');
            $table->string('assume_name')->comment('责任承担方');
            $table->string('phenomenon_process',200)->default('')->comment('故障处理过程');
            $table->string('phenomenon_result',200)->default('')->comment('故障处理结果');
            $table->string('remark',200)->default('')->comment('');
            $table->string('images',500)->default('')->comment('附件/图片');
            $table->tinyInteger('examine_status')->default(1)->comment('审核状态,1:待审批 2:审批中 3:审批通过  9:审核未通过');
            $table->tinyInteger('status')->default(1)->comment('1:待完成 2:操作中 3:完成');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_repair_report COMMENT='设备维修明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_repair_report');
    }
}

<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentInspectionReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_inspection_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('assign_admin_id')->comment('指派人');
            $table->integer('inspection_id')->comment('巡检设置id');
            $table->integer('equipment_id')->comment('设备id');
            $table->integer('contract_id')->default(0)->comment('合同id');
            $table->integer('inspection_admin_id')->comment('巡检人id');
            $table->timestamp('start_at')->nullable()->comment('巡检开始时间');
            $table->timestamp('end_at')->nullable()->comment('巡检结束数据');
            $table->tinyInteger('is_has_fault')->default(0)->comment('是否有故障,1:有 0:无');
            $table->string('inspection_result')->default('')->comment('巡检小结');
            $table->string('remark',200)->default('')->comment('备注');
            $table->string('images',500)->default('')->comment('附件/图片');
            $table->tinyInteger('examine_status')->default(1)->comment('审核状态,1:待审批 2:审批中 3:审批通过  9:审核未通过');
            $table->tinyInteger('status')->default(1)->comment('1:待完成 2:操作中 3:完成');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_inspection_report COMMENT='设备巡检明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_inspection_report');
    }
}

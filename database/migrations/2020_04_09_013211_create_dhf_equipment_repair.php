<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentRepair extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_repair', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_id')->comment('设备id');
            $table->string('reason',200)->default('')->comment('维修原因');
            $table->string('repair_num',30)->comment('维修编号');
            $table->timestamp('plan_time')->nullable()->comment('计划维修时间');
            $table->tinyInteger('source_type')->default(1)->comment('来源类别,1:正常提交 2:巡检发生 3:保养发生');
            $table->integer('source_id')->default(0)->comment('来源id');
            $table->string('applicant_username',20)->default('')->comment('设备报修人');
            $table->string('applicant_mobile',20)->default('')->comment('报修人联系方式');
            $table->string('address',100)->default('')->comment('维修地点');
            $table->string('phenomenon',200)->default('')->comment('故障现象');
            $table->string('remark',200)->default('')->comment('备注');
            $table->integer('status')->default(1)->comment('维修状态,1:待维修 2:维修中 3:维修完成');
            $table->tinyInteger('examine_status')->default(1)->comment('审核状态,1:待审批 2:审批中 3:审批通过  9:审核未通过');
            $table->integer('user_admin_id')->comment('申请人id,user_admin');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_repair COMMENT='设备维修申请'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_repair');
    }
}

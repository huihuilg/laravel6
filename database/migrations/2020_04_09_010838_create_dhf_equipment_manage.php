<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentManage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_manage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manage_num',30)->comment('处置单号');
            $table->integer('store_id')->comment('门店id');
            $table->integer('warehouse_id')->comment('仓库id');
            $table->string('manage_user_name',20)->default('')->comment('处置人');
            $table->timestamp('manage_time')->nullable()->comment('处置时间');
            $table->integer('total_price')->default(0)->comment('总处置金额 单位:分');
            $table->string('reason',200)->default('')->comment('处置原因');
            $table->string('remark',200)->default('')->comment('处置信息');
            $table->string('images',500)->default('')->comment('附件');
            $table->tinyInteger('status')->default(1)->comment('处理状态,1:待处理 2:处理中 3:处理完成');
            $table->tinyInteger('examine_status')->default(1)->comment('审核状态,1:待审批 2:审批中 3:审批通过  4:审核未通过 9:撤销');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_manage COMMENT='设备处置申请单'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_manage');
    }
}

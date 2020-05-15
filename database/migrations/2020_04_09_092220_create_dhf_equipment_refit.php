<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentRefit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_refit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_id')->comment('设备id');
            $table->tinyInteger('source_type')->default(1)->comment('改装来源,1:厂家要求 2:客户发起');
            $table->string('node',200)->default('')->comment('改装事项');
            $table->string('material',200)->default('')->comment('涉及物料');
            $table->string('norm',200)->default('')->comment('作业规范');
            $table->string('ask',200)->default('')->comment('闭环要求');
            $table->tinyInteger('examine_status')->default(1)->comment('审核状态,1:待审批 2:审批中 3:审批通过  9:审核未通过');
            $table->tinyInteger('status')->default(1)->comment('1:待完成 2:操作中 3:完成');
            $table->string('remark',200)->default('')->comment('备注');
            $table->string('images',500)->default('')->comment('附件');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_refit COMMENT='设备改装申请'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_refit');
    }
}

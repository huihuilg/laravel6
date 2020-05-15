<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentRepairPart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_repair_part', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('report_id')->comment('维修申请报告明细id');
            $table->integer('equipment_part_id')->comment('配件id');
            $table->tinyInteger('type')->default(1)->comment('类别,1:仓库自有 2:临时采购');
            $table->string('equipment_part_name')->default('')->comment('设备名称');
            $table->string('equipment_part_type')->default('')->comment('设备型号');
            $table->integer('num')->comment('使用数量');
            $table->integer('price')->comment('配件单价');
            $table->string('images',500)->default('')->comment('附件/图片');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_repair_part COMMENT='设备维修使用配件明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_repair_part');
    }
}

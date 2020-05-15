<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentInspectionCost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_inspection_cost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_inspection_report_id')->comment('巡检报告id');
            $table->string('title',50)->comment('费用名称');
            $table->integer('price')->comment('金额 单位:分');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_inspection_cost COMMENT='设备巡检报告支出明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_inspection_cost');
    }
}

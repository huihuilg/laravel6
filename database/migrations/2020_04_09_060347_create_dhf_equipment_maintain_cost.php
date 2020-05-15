<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentMaintainCost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_maintain_cost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('report_id')->comment('保养明细id');
            $table->string('title',50)->comment('费用名称');
            $table->integer('price')->default(0)->comment('金额 单位:分');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_maintain_cost COMMENT='设备保养费用明细'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_maintain_cost');
    }
}

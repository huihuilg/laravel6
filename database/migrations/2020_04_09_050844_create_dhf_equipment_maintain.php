<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentMaintain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_maintain', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_id')->comment('设备id');
            $table->tinyInteger('maintain_cycle_type')->default(1)->comment('保养周期,1:天 2:小时');
            $table->integer('maintain_cycle_date')->default(0)->comment('保养周期');
            $table->integer('warning_tips_of_hours')->default(0)->comment('预警值 单位小时');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_maintain COMMENT='设备保养'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_maintain');
    }
}

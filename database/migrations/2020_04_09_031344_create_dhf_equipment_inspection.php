<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentInspection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_inspection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_id')->comment('设备id');
            $table->dateTime('last_date')->nullable()->comment('最后巡检日期');
            $table->integer('inspection_cycle_of_day')->comment('巡检周期 天为单位');
            $table->tinyInteger('is_need_inspection')->default(1)->comment('是否需要巡检,1:是 0:否');
            $table->tinyInteger('status')->default(0)->comment('巡检状态,1:已巡检 0:未巡检');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_inspection COMMENT='设备巡检设置'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_inspection');
    }
}

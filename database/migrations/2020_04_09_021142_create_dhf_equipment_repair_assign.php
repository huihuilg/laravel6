<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentRepairAssign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_repair_assign', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_repair_id')->comment('维修申请单id');
            $table->integer('assign_admin_id')->comment('指派人');
            $table->integer('assign_time')->comment('指派时间');
            $table->integer('repair_admin_id')->comment('维修人');
            $table->integer('repair_mobile')->comment('维修人电话');
            $table->tinyInteger('type')->default(1)->comment('类别,1:负责人 0:非负责人');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_repair_assign COMMENT='设备维修指派人明细'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_repair_assign');
    }
}

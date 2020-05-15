<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentSubletReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_sublet_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sublet_id')->comment('转租单id');
            $table->integer('equipment_id')->comment('设备id');
            $table->integer('price')->default(0)->comment('租金 天/元');
            $table->date('start_date')->comment('开始时间');
            $table->date('end_date')->comment('结束时间');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_sublet_report COMMENT='设备转租信息明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_sublet_report');
    }
}

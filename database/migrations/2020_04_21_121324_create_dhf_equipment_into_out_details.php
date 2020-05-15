<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentIntoOutDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_into_out_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->default(1)->comment('类别,1:入库 2:出库');
            $table->integer('source_id')->comment('来源id');
            $table->integer('equipment_id')->comment('设备id');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_into_log COMMENT='设备出入库记录管理设备详情'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_into_out_details');
    }
}

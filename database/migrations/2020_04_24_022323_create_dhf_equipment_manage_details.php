<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentManageDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_manage_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('manage_id')->comment('处置单id');
            $table->integer('equipment_id')->comment('设备id');
            $table->integer('manage_price')->default(0)->comment('处置金额 单位:分');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_manage_details COMMENT='设备处置明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_manage_details');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class CreateDhfEquipmentAllocationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_allocation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('allocation_id')->comment('调拨单id');
            $table->integer('category_id')->comment('设备分类id');
            $table->integer('equipment_series_id')->comment('设备系列id');
            $table->string('key_param',30)->comment('关键参数');
            $table->integer('equipment_num')->default(0)->comment('设备数量');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_allocation_details COMMENT='设备调拨明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_allocation_details');
    }
}

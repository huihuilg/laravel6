<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentTypeParam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_type_param', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_type_id')->comment('设备型号id');
            $table->integer('equipment_param_id')->comment('设备系列参数id');
            $table->string('param_value',50)->comment('设备参数值')->default('');
            $table->tinyInteger('status')->default(1)->comment('状态,1:正常 5:禁用');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_type_param COMMENT='设备型号参数详情'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_type_param');
    }
}

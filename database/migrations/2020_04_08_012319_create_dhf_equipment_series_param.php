<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentSeriesParam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_series_param', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_series_id')->comment('设备系列id');
            $table->string('param_key',50)->comment('参数名称');
            $table->string('param_unit',20)->comment('参数单位');
            $table->tinyInteger('is_fill')->default(1)->comment('是否是必填,1:是 0:否');
            $table->tinyInteger('is_system')->default(1)->comment('是否是系统公共参数,1:是 0:否');
            $table->tinyInteger('is_key')->default(0)->comment('是否是关键参数,1:是 0:否');
            $table->integer('status')->default(1)->comment('状态,1:正常 5:禁用');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_series_param COMMENT='设备系列参数'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_series_param');
    }
}

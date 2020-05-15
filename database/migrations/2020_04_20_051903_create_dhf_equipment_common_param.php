<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentCommonParam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_common_param', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('param_key',50)->comment('参数名称');
            $table->string('param_unit',10)->comment('参数单位');
            $table->tinyInteger('status')->default(1)->comment('状态,1:正常 5:禁用');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_common_param COMMENT='设备公共参数'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_common_param');
    }
}

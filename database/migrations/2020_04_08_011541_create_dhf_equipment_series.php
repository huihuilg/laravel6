<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->comment('系列名称');
            $table->integer('equipment_category_id')->comment('设备类别id')->default(1);
            $table->tinyInteger('status')->default(1)->comment('状态,1:正常 5:禁用');
            $table->string('remark',50)->default('')->comment('备注');
            $table->integer('user_admin_id')->comment('创建人id');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_series COMMENT='设备系列字典'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_series');
    }
}

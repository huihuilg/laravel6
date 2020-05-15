<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('equipment_type_num','50')->comment('型号编码');
            $table->integer('equipment_brand_id')->comment('设备品牌id');
            $table->integer('equipment_series_id')->comment('设备系列id');
            $table->string('images',600)->comment('设备图片');
            $table->string('remark',200)->comment('备注');
            $table->integer('user_admin_id')->comment('创建人id');
            $table->tinyInteger('power_source_type')->default(1)->comment('动力源类别,1:电动 2:柴动');
            $table->integer('status')->default(1)->comment('状态,1:正常 5:禁用');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_type COMMENT='设备型号字典'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_type');
    }
}

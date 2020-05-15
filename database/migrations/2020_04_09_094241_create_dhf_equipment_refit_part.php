<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentRefitPart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_refit_part', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('report_id')->comment('改装报告id');
            $table->integer('equipment_part_id')->comment('配件id');
            $table->integer('num')->default(0)->comment('数量');
            $table->string('remark',50)->default('')->comment('备注');
            $table->tinyInteger('type')->default(1)->comment('类别,1:新配件 2:旧配件');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_refit_part COMMENT='设备改装使用配件明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_refit_part');
    }
}

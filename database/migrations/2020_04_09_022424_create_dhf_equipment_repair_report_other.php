<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentRepairReportOther extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_repair_report_other', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('report_id')->comment('维修明细id');
            $table->tinyInteger('type')->default(1)->comment('类别,1:公司人 2:厂方 3:客户');
            $table->string('name',30)->comment('名称');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_repair_report_other COMMENT='设备维修明细同行人'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_repair_report_other');
    }
}

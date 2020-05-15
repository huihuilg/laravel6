<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentMaintainContents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_maintain_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('report_id')->comment('保养报告明细id');
            $table->string('name',50)->comment('保养部位名称');
            $table->string('remark',200)->comment('描述');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_maintain_contents COMMENT='设备保养报告保养部件明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_maintain_contents');
    }
}

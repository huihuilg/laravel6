<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentAllocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_allocation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('allocation_num',30)->comment('调拨单号');
            $table->date('allocation_date')->comment('调拨日期');
            $table->integer('out_area_id')->comment('调出大区id');
            $table->integer('out_store_id')->comment('调出门店id');
            $table->integer('out_warehouse_id')->comment('调出仓库id');
            $table->integer('into_warehouse_id')->comment('调进仓库id');
            $table->integer('into_area_id')->comment('调进大区id');
            $table->integer('into_store_id')->comment('调进门店id');
            $table->integer('equipment_num')->default(0)->comment('调拨总台数');
            $table->integer('is_logistics')->default(0)->comment('是否需要物流,1:需要 0:不需要');
            $table->tinyInteger('status')->default(1)->comment('调拨状态,1:未发货 2:在途 3:已接受');
            $table->tinyInteger('examine_status')->default(1)->comment('审核状态,1:待审批 2:审批中 3:审批通过  4:审核未通过 9:撤销');
            $table->string('remark',200)->default('')->comment('备注');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_allocation COMMENT='设备调拨'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_allocation');
    }
}

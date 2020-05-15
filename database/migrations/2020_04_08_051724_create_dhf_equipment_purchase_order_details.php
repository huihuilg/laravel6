<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentPurchaseOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_purchase_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipment_type_id')->comment('设备型号id');
            $table->integer('purchase_order')->comment('采购单id');
            $table->integer('num')->comment('采购数量')->default(0);
            $table->integer('price')->default(0)->comment('设备单价 单位:分');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_purchase_order_details COMMENT='设备采购清单明细'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_purchase_order_details');
    }
}

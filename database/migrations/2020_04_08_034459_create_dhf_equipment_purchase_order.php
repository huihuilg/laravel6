<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentPurchaseOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_purchase_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_num')->comment('采购单号');
            $table->tinyInteger('type')->comment('采购形式, 1:融资 2:分期 3:全额 4:按揭');
            $table->dateTime('plan_time')->comment('计划采购日期');
            $table->integer('liable_admin_id')->comment('采购负责人id');
            $table->string('liable_admin_mobile')->comment('采购负责人联系方式');
            $table->string('remark')->default('')->comment('备注');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_purchase_order COMMENT='设备采购清单'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_purchase_order');
    }
}

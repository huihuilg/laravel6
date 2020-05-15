<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDhfLogisticsOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_logistics_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->comment('物流单id');
            $table->integer('equipment_id')->default(0)->comment('设备id');
            $table->string('equipment_code')->default('')->comment('设备编号');
            $table->integer('price')->default(0)->comment('价格 单位:分');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_logistics_order_details COMMENT='物流订单详情'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_logistics_order_details');
    }
}

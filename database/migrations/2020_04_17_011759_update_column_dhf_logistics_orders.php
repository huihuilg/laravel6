<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfLogisticsOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_logistics_orders', function (Blueprint $table) {
            $table->string('logistics_order_num',30)->default('')->comment('物流订单编号')->after('source_code');
            $table->tinyInteger('source_type')->default(9)->comment('物流订单类别,0:其他 1:进场 2:退场 3:调拨 4:返厂维修 9:其他')->after('source_id');

            $table->string('driver_license_image',200)->default('')->comment('驾驶证')->after('total_price');
            $table->string('driving_license_image',200)->default('')->comment('行驶证')->after('driver_license_image');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhf_logistics_orders', function (Blueprint $table) {
            //
        });
    }
}

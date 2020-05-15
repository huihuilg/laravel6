<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_store', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 126)->comment('门店名称')->default("");
            $table->string('no', 36)->comment('门店编号')->default("");
            $table->string('shop_owner', 36)->comment('店长')->default("");
            $table->string('head_image',256)->comment('门店门头照')->default("");
            $table->string('phone',25)->comment('联系电话')->default("");
            $table->string('qr_code',25)->comment('联系人二维码')->default("");
            $table->tinyInteger('status')->comment('门店状态')->default(1);
            $table->unsignedInteger('province_id')->comment('省id')->default(0);
            $table->unsignedInteger('city_id')->comment('市id')->default(0);
            $table->unsignedInteger('area_id')->comment('区id')->default(0);
            $table->string('adcode',16)->comment('所属地区adcode')->default("");
            $table->string('address',128)->comment('详细地址')->default("");
            $table->string('full_address',256)->comment('完整详细地址')->default("");
            $table->string('longitude')->comment('经度')->default("0");
            $table->string('latitude')->comment('纬度')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_store COMMENT='门店表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_store');
    }
}

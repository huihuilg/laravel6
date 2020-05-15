<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductDetailTable extends Migration
{
    /**
     * 商品详情表，后期可将详情以文件形式存储到云端（七牛云）
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_product_detail', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('product_id')->comment('商品id')->default(0);
            $table->mediumText('usage_scenario')->comment('使用场景');
            $table->mediumText('instruction')->comment('操作说明');
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_product_detail COMMENT='商品详情表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_product_detail');
    }
}

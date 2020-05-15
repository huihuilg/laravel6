<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductParameterTable extends Migration
{
    /**
     * 商品参数表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_product_parameter', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('product_id')->comment('商品id')->default(0);
            $table->float('length')->comment('商品长度，单位cm')->default(0);
            $table->float('width')->comment('商品宽度')->default(0);
            $table->float('height')->comment('商品高度')->default(0);
            $table->float('weight')->comment('商品重量')->default(0);
            $table->float('platform_length')->comment('商品平台长度')->default(0);
            $table->float('platform_width')->comment('商品平台宽度')->default(0);
            $table->float('platform_height')->comment('商品平台高度')->default(0);
            $table->float('platform_extend')->comment('商品平台延伸')->default(0);
            $table->float('platform_load')->comment('商品平台载重')->default(0);
            $table->float('platform_all_height')->comment('商品平台总高度')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_product_parameter COMMENT='商品参数表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_product_parameter');
    }
}

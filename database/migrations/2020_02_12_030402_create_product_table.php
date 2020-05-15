<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductTable extends Migration
{
    /**
     * 商品表(SPU表)
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_product', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 126)->comment('商品名称')->default("");
            $table->string('no', 36)->comment('商品编号')->default("");
            $table->string('image',256)->comment('商品主图地址')->default("");
            $table->tinyInteger('status')->comment('状态，1：正常 5：禁用')->default(1);
            $table->tinyInteger('is_recommend')->comment('状态，1：正常 2：推荐')->default(1);
            $table->unsignedInteger('cate_id')->comment('分类id')->default(0);
            $table->unsignedInteger('sort')->comment('排序值，值越大越靠前')->default(0);
            $table->unsignedInteger('day_price')->comment('单日价格,单位分')->default(0);
            $table->unsignedInteger('week_price')->comment('单周价格,单位分')->default(0);
            $table->unsignedInteger('month_price')->comment('单月价格,单位分')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_product COMMENT='商品SPU表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_product');
    }
}

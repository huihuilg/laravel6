<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductCateTable extends Migration
{
    /**
     * 商品分类表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_product_cate', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 36)->comment('分类名称')->default("");
            $table->string('ico',256)->comment('分类图标地址')->default("");
            $table->tinyInteger('status')->comment('状态，1：正常 5：禁用')->default(1);
            $table->unsignedInteger('parent_id')->comment('上级分类id，顶级分类为0')->default(0);
            $table->unsignedInteger('sort')->comment('排序值，值越大越靠前')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_product_cate COMMENT='商品分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_product_cate');
    }
}

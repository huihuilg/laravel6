<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductImageTable extends Migration
{
    /**
     * 商品图片表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_product_image', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('product_id')->comment('商品id')->default(0);
            $table->string('url',256)->comment('图片地址')->default("");
            $table->tinyInteger('is_master')->comment('是否主图，1：正常 2：主图')->default(1);
            $table->unsignedInteger('sort')->comment('排序值，值越大越靠前')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_product_image COMMENT='商品图片表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_product_image');
    }
}

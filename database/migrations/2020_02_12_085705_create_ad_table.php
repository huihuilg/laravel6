<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_ad', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('ad_position_id')->comment('位置id')->default(0);
            $table->string('title', 64)->comment('图片标题')->default("");
            $table->string('image',256)->comment('图片地址')->default("");
            $table->string('jump_url',128)->comment('跳转链接')->default("");
            $table->timestamp('start_at')->nullable()->comment('开始时间');
            $table->timestamp('end_at')->nullable()->comment('结束时间');
            $table->tinyInteger('status')->comment('状态，1：正常 5：下架')->default(1);
            $table->unsignedInteger('click_num')->comment('点击次数')->default(1);
            $table->unsignedInteger('sort')->comment('排序值，值越大越靠前')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_ad COMMENT='广告表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_ad');
    }
}

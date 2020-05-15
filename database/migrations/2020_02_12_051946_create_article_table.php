<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_article', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('title', 126)->comment('资讯标题')->default("");
            $table->string('author', 36)->comment('作者')->default("");
            $table->timestamp('release_at')->nullable()->comment('发布时间');
            $table->string('cover',256)->comment('封面图地址')->default("");
            $table->string('desc',512)->comment('资讯概述')->default("");
            $table->tinyInteger('status')->comment('状态，1：正常 3：草稿 5：禁用')->default(1);
            $table->tinyInteger('is_recommend')->comment('状态，1：正常 2：推荐')->default(1);
            $table->tinyInteger('is_original')->comment('状态，1：原创 2：转载')->default(1);
            $table->unsignedInteger('cate_id')->comment('分类id')->default(0);
            $table->unsignedInteger('sort')->comment('排序值，值越大越靠前')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_article COMMENT='文章表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_article');
    }
}

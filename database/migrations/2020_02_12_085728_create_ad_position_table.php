<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAdPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_ad_position', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 126)->comment('广告位置')->default("");
            $table->tinyInteger('type')->comment('类型，1：banner轮播 3：单图 5：二宫格 6：四宫格')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_ad_position COMMENT='广告位置表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_ad_position');
    }
}

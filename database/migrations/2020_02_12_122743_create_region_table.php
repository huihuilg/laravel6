<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_region', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('code', 16)->comment('地区码')->default("");
            $table->string('name', 64)->comment('名称')->default("");
            $table->unsignedInteger('parent_id')->comment('上级id')->default(0);
            $table->string('parent_code', 16)->comment('上级地区码')->default("");
            $table->tinyInteger('level')->comment('等级，1：省份直辖市 2：地级市 3：区县 4：乡镇街道 5：乡村社区')->default(0);
            $table->string('full_name', 256)->comment('完整名称，用小写空格分隔')->default("");
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_region COMMENT='地区表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_region');
    }
}

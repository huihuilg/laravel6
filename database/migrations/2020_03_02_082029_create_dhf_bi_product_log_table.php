<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfBiProductLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_bi_product_log', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('user_id')->comment('用户id')->default(0);
            $table->unsignedInteger('product_id')->comment('商品id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_bi_product_log COMMENT='商品访问记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_bi_prdocut_log');
    }
}

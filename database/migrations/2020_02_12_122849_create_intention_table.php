<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateIntentionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_intention', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('user_id')->comment('用户id')->default(0);
            $table->unsignedInteger('product_id')->comment('商品id')->default(0);
            $table->string('mobile', 16)->comment('手机号')->default("");
            $table->string('name', 20)->comment('姓名')->default("");
            $table->tinyInteger('status')->comment('状态,1：待跟进 2：跟进中 3：已完成 4：已关闭')->default(0);
            $table->string('remark', 256)->comment('备注说明')->default("");
            $table->unsignedInteger('follow_up_admin_user_id')->comment('跟进后台用户admin_id')->default(0);
            $table->string('follow_up_admin_user_name', 20)->comment('后台跟进人姓名')->default("");
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_intention COMMENT='意向表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_intention');
    }
}

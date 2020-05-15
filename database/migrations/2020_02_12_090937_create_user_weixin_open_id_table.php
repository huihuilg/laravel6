<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUserWeixinOpenIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_user_weixin_open_id', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('user_id')->comment('用户id')->default(0);
            $table->string('open_id', 64)->comment('微信open_id')->default("");
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_user_weixin_open_id COMMENT='微信open_id表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_user_weixin_open_id');
    }
}

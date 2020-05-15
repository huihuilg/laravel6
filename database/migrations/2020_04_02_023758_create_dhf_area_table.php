<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_area', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',64)->comment('区域名称')->default('');
            $table->integer('leader_admin_id')->comment('大区负责人')->default(0);
            $table->integer('user_admin_id')->comment('创建人');
            $table->tinyInteger('status')->comment('状态，1：正常 5: 禁用')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_area COMMENT='大区列表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_area');
    }
}

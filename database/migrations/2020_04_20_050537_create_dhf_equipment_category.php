<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',30)->default('')->comment('分类名称');
            $table->string('remark',50)->default('')->comment('备注');
            $table->integer('user_admin_id')->default(0)->comment('创建人id,user_admin');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_category COMMENT='设备分类'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_category');
    }
}

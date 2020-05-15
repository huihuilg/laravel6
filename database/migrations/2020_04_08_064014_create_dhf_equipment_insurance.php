<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentInsurance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_insurance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name',50)->comment('保险公司名称');
            $table->string('insurance_num',30)->comment('保险单号')->default('');
            $table->string('name',50)->comment('保险名称');
            $table->string('insurance_user_name')->comment('保险公司联系人')->default('');
            $table->string('insurance_user_mobile')->comment('联系人电话')->default('');
            $table->integer('price')->default(0)->comment('保险总额 单位:分');
            $table->timestamp('start_at')->nullable()->comment('合同开始时间');
            $table->timestamp('end_at')->nullable()->comment('合同结束时间');
            $table->string('remark',200)->comment('备注信息');
            $table->string('images',500)->comment('附件信息:图片地址等');
            $table->tinyInteger('status')->default(1)->comment('状态,1:正在使用 5:过期');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_insurance COMMENT='保单列表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_insurance');
    }
}

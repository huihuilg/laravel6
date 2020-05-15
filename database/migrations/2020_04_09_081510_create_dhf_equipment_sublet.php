<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentSublet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_sublet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sublet_num',30)->comment('转租单号');
            $table->string('company_name',50)->default('')->comment('公司名称');
            $table->string('username',30)->default('')->comment('公司负责人');
            $table->string('mobile',30)->default('')->comment('负责人联系方式');
            $table->string('company_address',100)->default('')->comment('公司地址');
            $table->string('address',100)->default('')->comment('详细地址');
            $table->tinyInteger('sublet_type')->default(1)->comment('转租类型,1:日租 2:月租');
            $table->date('start_date')->comment('转租日期');
            $table->date('end_date')->comment('还租日期');
            $table->string('remark',200)->default('')->comment('备注');
            $table->string('images',500)->default('')->comment('附件');
            $table->tinyInteger('status')->default(1)->comment('转租状态,1:待转租 2:转租中 3:已结束');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_sublet COMMENT='设备转租清单'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_sublet');
    }
}

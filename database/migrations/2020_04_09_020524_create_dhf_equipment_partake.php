<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDhfEquipmentPartake extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_partake', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('report_id')->comment('维修申请明细id');
            $table->tinyInteger('type')->default(1)->comment('类别,1:公司 2:厂家 3:客户');
            $table->integer('equipment_brand_id')->default(0)->comment('厂家id');
            $table->integer('customer_id')->default(0)->comment('客户id');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_partake COMMENT='设备维修申请现场参与方'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_partake');
    }
}

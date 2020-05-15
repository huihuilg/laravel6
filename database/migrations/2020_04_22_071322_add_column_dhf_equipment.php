<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDhfEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_equipment', function (Blueprint $table) {
            $table->tinyInteger('purchase_form')->default(0)->comment('采购形式 1 融资, 2 分期, 3 全额, 4 按揭 ')->after('other_status');
            $table->string('engine_brand',64)->default('')->comment('发动机品牌')->after('source_type');
            $table->string('engine_type_num',64)->default('')->comment('发动机型号')->after('source_type');
            $table->string('engine_num',64)->default('')->comment('发动机编号')->after('source_type');
            $table->integer('equipment_brand_id')->comment('设备品牌id')->after('source_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfEquipmentBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_equipment_brand', function (Blueprint $table) {
            $table->integer('user_admin_id')->default(0)->comment('创建人id,user_admin表')->after('name');
            $table->string('remark',50)->default('')->comment('备注')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhf_equipment_brand', function (Blueprint $table) {
            //
        });
    }
}

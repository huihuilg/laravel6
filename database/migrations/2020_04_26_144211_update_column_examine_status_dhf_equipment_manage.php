<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnExamineStatusDhfEquipmentManage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_equipment_manage', function (Blueprint $table) {
            $table->smallInteger('examine_status')->default(1)->comment('审核状态,1:待审批 2:审批中 3:审批通过  4:审核未通过 5:未提交 9:撤销')
                ->change();
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

<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfEquipmentRefitReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_equipment_refit_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('refit_id')->comment('改装申请单id');
            $table->string('report_num',30)->comment('报告单号');
            $table->integer('refit_admin_id')->comment('改装执行人');
            $table->timestamp('start_at')->nullable()->comment('改装开始时间');
            $table->timestamp('end_at')->nullable()->comment('改装结束时间');
            $table->integer('assign_admin_id')->comment('指派人');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_equipment_refit_report COMMENT='设备改装申请报告'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_equipment_refit_report');
    }
}

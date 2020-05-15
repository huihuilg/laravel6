<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDhfEquipmentManageDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_equipment_manage_details', function (Blueprint $table) {
            $table->string('reason','200')->default('')->comment('处置原因')->after('manage_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhf_equipment_manage_details', function (Blueprint $table) {
            //
        });
    }
}

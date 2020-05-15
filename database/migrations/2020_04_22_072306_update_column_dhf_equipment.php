<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_equipment', function (Blueprint $table) {
            $table->smallInteger('other_status')->default(1)->comment('设备租赁关联状态,1:在库 2:在途 3:场地  9:其他')
                ->change();
            $table->smallInteger('lease_status')->default(1)->comment('租赁状态,1:在租 2:待租')
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

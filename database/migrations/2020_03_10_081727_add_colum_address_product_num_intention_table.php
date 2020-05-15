<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumAddressProductNumIntentionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhf_intention', function (Blueprint $table) {
            $table->string('need_product_list', 256)->comment('影响产品列表，serialize')->default("");
            $table->string('address', 256)->comment('用车地址')->default("");
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateIntentionFollowUpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_intention_follow_up', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('intention_id')->comment('意向id')->default(0);
            $table->unsignedInteger('admin_id')->comment('跟进人admin_id')->default(0);
            $table->string('admin_name', 20)->comment('跟进人姓名')->default("");
            $table->string('remark', 256)->comment('备注说明')->default("");
            $table->timestamps();
            $table->softDeletes();
        });

        //表注释
        DB::statement("ALTER TABLE dhf_intention_follow_up COMMENT='意向跟进记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_intention_follow_up');
    }
}

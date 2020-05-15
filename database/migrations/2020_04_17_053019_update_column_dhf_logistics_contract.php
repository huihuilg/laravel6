<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnDhfLogisticsContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_logistics_contract', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('logistics_company_id')->comment('物流公司id');
            $table->string('contract_num',30)->default('')->comment('合同编号');
            $table->date('start_at')->nullable()->comment('开始时间');
            $table->date('end_at')->nullable()->comment('结束时间');
            $table->string('images',300)->default('')->comment('附件');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_logistics_contract COMMENT='物流合同'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_logistics_contract');
    }
}

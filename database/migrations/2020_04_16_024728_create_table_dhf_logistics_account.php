<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDhfLogisticsAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_logistics_company_account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('logistics_company_id')->comment('物流公司id');
            $table->tinyInteger('status')->default(1)->comment('状态,1:正常');
            $table->string('account_num',20)->default('')->comment('结算账户');
            $table->string('opening_bank',100)->default('')->comment('开户行');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_logistics_company_account COMMENT='物流公司账户信息'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_logistics_company_account');
    }
}

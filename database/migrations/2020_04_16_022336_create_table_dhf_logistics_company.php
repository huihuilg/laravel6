<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDhfLogisticsCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_logistics_company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',30)->comment('公司名称');
            $table->string('company_code',30)->default('')->comment('社会统一信用码');
            $table->string('company_user_name',20)->default('')->comment('公司负责人');
            $table->string('company_user_mobile',20)->default('')->comment('公司负责人联系方式');
            $table->string('user_admin_name',20)->default('对接人');
            $table->integer('province_code')->comment('省编码');
            $table->integer('city_code')->comment('市区编码');
            $table->integer('county_code')->comment('县编码');
            $table->string('province_name',20)->default('')->comment('省名称');
            $table->string('city_name',20)->default('')->comment('市名称');
            $table->string('county_name',20)->default('')->comment('县名称');
            $table->string('address',100)->default('')->comment('详细地址');
            $table->tinyInteger('settlement_type')->default(1)->comment('结算方式,1:次结 2:周结 3:月结 4:季结 5:年结');
            $table->tinyInteger('pay_type')->default(1)->comment('支付方式,1:对公  2:对私');
            $table->string('license_image',200)->default('')->comment('营业执照');
            $table->string('other_image',200)->default('')->comment('其他照片');
            $table->integer('user_admin_id')->comment('创建人');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_logistics_company COMMENT='物流公司'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_logistics_company');
    }
}

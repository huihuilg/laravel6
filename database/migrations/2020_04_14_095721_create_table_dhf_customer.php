<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDhfCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->default('')->comment('客户名称/企业名称');
            $table->string('code',20)->default('')->comment('客户编号');
            $table->string('type')->default(1)->comment('类别,1:个人 2:企业');
            $table->string('company_type')->default(0)->comment('企业类型,1:国企 2:上市公司 3:地方政府企业 4:私人企业 5:合资企业 6:其他 0:无');
            $table->string('customer_code',30)->default('')->comment('身份证/社会统一信用码');
            $table->integer('gender')->default(0)->comment('性别,0:未知 1:男 2:女');
            $table->string('legal_person',10)->default('')->comment('法人');
            $table->string('identity_card_image1',200)->default('')->comment('身份证正面');
            $table->string('identity_card_image2',200)->default('')->comment('身份证反面');
            $table->string('license_image',200)->default('')->comment('营业执照');
            $table->string('other_image',200)->default('')->comment('其他照片');
            $table->integer('province_code')->default(0)->comment('省编码');
            $table->integer('city_code')->default(0)->comment('市区编码');
            $table->integer('county_code')->default(0)->comment('县编码');
            $table->string('province_name',20)->default('')->comment('省名称');
            $table->string('city_name',20)->default('')->comment('市名称');
            $table->string('county_name',20)->default('')->comment('县名称');
            $table->string('address',100)->default('')->comment('详细地址');
            $table->integer('user_admin_id')->comment('创建人id');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_customer COMMENT='客户表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_customer');
    }
}

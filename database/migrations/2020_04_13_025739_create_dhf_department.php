<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhfDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhf_department', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->comment('部门名称');
            $table->integer('type')->default(1)->comment('归属,1:总部 2:大区 3:门店');
            $table->tinyInteger('sort')->default(0)->comment('排序 大的在前面');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE dhf_department COMMENT='部门字典'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhf_department');
    }
}

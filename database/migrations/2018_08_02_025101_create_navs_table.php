<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navs', function (Blueprint $table) {
//            字段名称	类型	备注
//id	primary	主键
            $table->increments('id');
//name	string	名称
            $table->string('name');
//url	string	地址
            $table->string('url');
//permission_id	int	关联权限id
            $table->integer('permission_id');
//pid	int	上级菜单id
            $table->integer('pid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navs');
    }
}

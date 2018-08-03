<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_prizes', function (Blueprint $table) {
//            字段名称	类型	备注
//id	primary	主键
            $table->increments('id');
//events_id	int	活动id
            $table->integer('events_id');
//name	string	奖品名称
            $table->string('name');
//description	text	奖品详情
            $table->text('description');
            //num int 数量
            $table->integer('num');
//member_id	int	中奖商家账号id
            $table->integer('member_id');
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
        Schema::dropIfExists('event_prizes');
    }
}

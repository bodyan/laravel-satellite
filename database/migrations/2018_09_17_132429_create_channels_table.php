<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enabled')->default(1);
            $table->integer('transponder_id')->unsigned();
            $table->integer('satellite_id')->unsigned();
            $table->string('name', 100);
            $table->integer('hdsd');
            $table->string('video_type', 100);
            $table->integer('sid');
            $table->integer('vpid');
            $table->integer('pcrpid');
            $table->integer('pmtpid');
            $table->integer('apid');
            $table->string('language');
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
        Schema::dropIfExists('channels');
    }
}

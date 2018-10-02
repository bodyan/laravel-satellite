<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranspondersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transponders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('satellite_id')->unsigned();
            $table->string('tp_system',10);
            $table->string('modulation',5);
            $table->integer('frequency');
            $table->integer('symbrate');
            $table->string('polarization',1);
            $table->string('fec',5);
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
        Schema::dropIfExists('transponders');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function (Blueprint $table) {
            $table->foreign('satellite_id')->references('id')->on('satellites');
        });

        Schema::table('channels', function (Blueprint $table) {
            $table->foreign('transponder_id')->references('id')->on('transponders');
        });

        Schema::table('transponders', function (Blueprint $table) {
            $table->foreign('satellite_id')->references('id')->on('satellites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channels', function (Blueprint $table) {
            $table->dropForeign('channels_id_sat_foreign');
        });

        Schema::table('channels', function (Blueprint $table) {
            $table->dropForeign('channels_id_tp_foreign');
        });

        Schema::table('transponders', function (Blueprint $table) {
            $table->dropForeign('transponders_id_sat_foreign');
        });
    }
}

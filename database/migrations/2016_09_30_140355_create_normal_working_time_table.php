<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalWorkingTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_working_time', function (Blueprint $table) {
            $table->char('day', 3);
            $table->char('time', 1);
            $table->primary(array('day', 'time'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('normal_working_time');
    }
}

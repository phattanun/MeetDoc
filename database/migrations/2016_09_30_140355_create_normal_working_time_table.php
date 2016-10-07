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
            $table->integer('doctor_ssn')->unsigned();
            $table->char('day', 9);
            $table->char('time', 1);
            $table->primary(array('doctor_ssn', 'day', 'time'));

            $table->integer('dept_id')->unsigned();
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

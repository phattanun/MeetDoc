<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialWorkingTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_working_time', function (Blueprint $table) {
            $table->date('day', 3);
            $table->char('time', 1);
            $table->char('type', 3); // add/sub
            $table->primary(array('day', 'time', 'type'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('special_working_time');
    }
}
